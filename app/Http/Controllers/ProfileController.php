<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile image.
     */
    public function actualizarImagen(Request $request): RedirectResponse
    {
        $request->validate([
            'imagen' => ['required', File::image()->min(10)->max(12 * 1024)->dimensions(Rule::dimensions()->maxWidth(1500)->maxHeight(1000))],
        ]);
       
        $user = $request->user();

        // Eliminar la imagen anterior si existe y no es la predeterminada
        if ($user->imagen && Storage::disk('public')->exists('nombre_img/' . $user->imagen)) {
            Storage::disk('public')->delete('nombre_img/' . $user->imagen);
        }
    
        // Subir la nueva imagen y obtener el nombre
        Storage::disk('public')->put('nombre_img', $request->file('imagen'));

        $request->user()->update([
            'imagen' =>  $request->file('imagen')->hashName(),
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-actualizarImagen');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
