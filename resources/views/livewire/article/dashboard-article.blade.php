@push('css.link.component')
    <link rel="stylesheet" href="{{asset('css/article/dashboard-article.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'>

@endpush
<div id="permissionWrapper" class="permissionWrapper">
{{--    <label for="inputFilterPermission" class="listFilterLabel" id="lab_serch">serch</label>--}}
{{--    <input id="inputFilterPermission" type="text" class="listFilterInput"/>--}}
    <a id="addUser" href="#" class="iconAdd" title="Add new user"></a>
    <div class="clear"></div>
    <br>
    <table id="listFilterPermission" class="listFilterContainer permissionsTable" cellspacing="0" cellpadding="0">
        <thead id="permissionsHead">

        <tr class="doNotFilter">
            <th>title</th>
            <th><div id="view" class="permissionTag" data-perm="view">View</div></th>
            <th><div id="edit" class="permissionTag" data-perm="edit">Edit</div></th>

            <th><div id="admin" class="permissionTag" data-perm="admin">Delete</div></th>
            <th></th>
        </tr>
        </thead>
        @foreach($articlesuser as $val)

        <tbody id="permissionsBody">
        <tr>
            <td>  <span contenteditable="true" class="userName">{{$val->title}}</span></td>
            <td><div class="permissionTag active" data-perm="view" wire:click="viewClick({{$val->id}})" >View</div></td>
            <td><div class="permissionTag active" data-perm="edit"wire:click="editClick({{$val->id}})">Edit</div></td>

            <td><div class="permissionTag active" data-perm="admin">Delete</div></td>
            <td><div class="permissionTag active" data-perm="admin"></div></td>
        </tr>
        </tbody>
        @endforeach
    </table>
</div>
