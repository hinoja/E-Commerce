<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class ListUser extends Component
{
    use WithPagination;
    public $delete_id, $editUserId, $name, $email, $role_id, $password, $userInfo;
    protected $paginationTheme = 'bootstrap';


    public function resetInput()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->role_id = 0;
    }
    public function saveUser()
    {
        Toastr::success('<i class="fa fa-check"></i> User added successfuly ', 'Success!!');
        $data = $this->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email'],
            // 'role_id' => ['required', 'max:1', 'min:0'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $Userdata = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ];
        $this->userInfo = User::create($Userdata);
        $this->userInfo->role_id = (int)$this->role_id;
        $this->userInfo->save();
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        // session()->flash('userAdded',' User added successfuly');
    }
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('confirmationDeleteUsermodal');
    }
    public function deleteUserData()
    {
        $user = User::find($this->delete_id);
        $user->delete();
        $this->dispatchBrowserEvent('close-modal');
        // Toastr::success('<i class="fa fa-check"></i>User deleted successfuly ', 'Success!!');
    }
    public function editUserModal($id)
    {
        $editUser = User::find($id);
        $this->editUserId =  $id;
        $this->name = $editUser->name;
        $this->email =  $editUser->email;
        $this->dispatchBrowserEvent('showEditUsermodal');
    }
    public function updateUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            // 'name'=>['required','string','min:2','unique:categories,name'],
        ]);
        $UpdateUser = User::findOrFail($this->editUserId);
        $UpdateUser->name = $this->name;
        $UpdateUser->email = $this->email;
        $UpdateUser->role_id = (int)$this->role_id;
        $UpdateUser->save();

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        Toastr::success('<i class="fa fa-check"></i>User updated successfuly ', 'Success!!');
        // Alert::success('<i class="fa fa-check"></i>User updated successfuly', 'Success Message');

        // dd($this->edit_id);
    }
    public function render()
    {
        return view('livewire.admin.user.list-user', ['users' => User::OrderBy('created_at', 'DESC')->paginate(5)]);
    }
}
