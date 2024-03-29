<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox">
        </th>
        <th style="with:90px;">Avatar</th>
        <th>Ho va ten</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Dia Chi</th>
        <th class="text-center">Tinh trang</th>
        <th class="text-center">Thao Tac</th>   
    </tr>
    </thead>
    <tbody>
        @if(isset($users) && is_object($users))
            @foreach ($users as $user)
            <tr>
                <td>
                    <input type="checkbox" value=""  class="input-checkbox checkBoxItem">
                </td>
                <td><span class="image img-cover"><img src="" alt=""></span></td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->phone}}
                </td> 
                <td>
                    {{$user->address}}
                </td>   
                <td class="text-center">
                    <input type="checkbox" class="js-switch" checked />
                </td>
                <td class="text-center">
                    <a href="" class="btn btn-success" ><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        @endif   
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4')}}