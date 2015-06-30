<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Http\Requests\ProfileRequest;
use CodeCommerce\Profile;
use CodeCommerce\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {


    private $profileModel;

    function __construct(Profile $profileModel)
    {
        $this->profileModel = $profileModel;
    }

    public function register()
    {
        $profile = User::find(Auth::id())->profile;
        return view('user.profile.register', compact('profile'));
	}

    public function storage(ProfileRequest $profileRequest)
    {
        $profile = $this->profileModel->updateOrCreate([
            'user_id' => Auth::id()],
            [
                'address' => $profileRequest->input('address'),
                'complement' => $profileRequest->input('complement'),
                'cep' => $profileRequest->input('cep'),
                'city' => $profileRequest->input('city'),
                'state' => $profileRequest->input('state'),
            ]);
        dd($profile);
    }
}
