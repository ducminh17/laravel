<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{   
    protected $userService;
    protected $provinceRepository;
    protected $userRepository;
    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        UserRepository $userRepository,
        ){
        $this->userService=  $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository=$userRepository;
    }
    public function index(Request $request){
        $users=$this->userService->paginate($request);
        //$users = User::paginate(10);
        $config=[
            'js'=> [
                'backend/js/plugins/switchery/switchery.js'
            ], 
            'css'=>[
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
        $config['seo']=config('apps.user');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));
    }
    public function create(){
        $provinces=$this->provinceRepository->all();
        $config = [
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo']=config('apps.user'); 
        $config['method']='create';
        $template = 'backend.user.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces'
        ));
    }
    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success','them moi thanh cong');
        }
        return redirect()->route('user.index')->with('error','Them moi khong thanh cong');
    }
    public function edit($id){
        $user = $this->userRepository->findById($id);
        $provinces=$this->provinceRepository->all();
        $config = [
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo']=config('apps.user'); 
        $config['method']='edit';
        $template = 'backend.user.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
            'user'
        ));
    }
    public function update($id,UpdateUserRequest $request) {
        if($this->userService->update($id,$request)){
            return redirect()->route('user.index')->with('success','cap nhat moi thanh cong');
        }
        return redirect()->route('user.index')->with('error','cap nhat moi khong thanh cong');
    }
    public function delete($id){
        $config['seo']=config('apps.user'); 
        $user = $this->userRepository->findById($id);
        $template = 'backend.user.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'user',
            'config',
        ));
    }
    public function destroy($id){
        if($this->userService->destroy($id)){
            return redirect()->route('user.index')->with('success','xoa thanh cong');
        }
        return redirect()->route('user.index')->with('error','xoa khong thanh cong');
    } 
}
