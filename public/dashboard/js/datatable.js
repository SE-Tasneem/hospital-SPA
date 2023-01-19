

let postTable = '/admin/posts';
let collegeTable = '/admin/colleges';
let staffTable = '/admin/staff';


$('#post-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:postTable
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'title', name: 'title' },
        { data: 'category', name: 'category' },
        { data: 'college', name: 'college' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'control', name: 'control' }
    ]
});


$('#college-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:collegeTable
    },
    columns: [
        { data: 'name', name: 'name' },
        { data: 'dean', name: 'dean' },
        { data: 'phone', name: 'phone' },
        { data: 'email', name: 'email' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'control', name: 'control' }
    ]
});

$('#staff-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:staffTable
    },
    columns: [
        { data: 'full_name', name: 'full_name' },
        { data: 'department', name: 'department' },
        { data: 'college', name: 'college' },
        { data: 'position', name: 'position' },
        { data: 'phone', name: 'phone' },
        { data: 'email', name: 'email' },
        { data: 'created_at', name: 'created_at' },
        { data: 'control', name: 'control' }
    ]
});