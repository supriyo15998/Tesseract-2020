<table>
    <thead>
    <tr>
        <th>Name</th>
<!--         <th>College Roll</th> -->
        <th>Department</th>
        <th>Year</th>
        <th>College ID</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Interest</th>
    </tr>
    </thead>
    <tbody>
    @foreach($volunteers as $volunteer)
        <tr>
            <td>{{ $volunteer->name }}</td>
<!--             <td>{{ $volunteer->college_roll }}</td> -->
            <td>{{ $volunteer->department->name }}</td>
            <td>{{ $volunteer->year }}</td>
            <td>{{ $volunteer->college_id }}</td>
            <td>{{ $volunteer->email }}</td>
            <td>{{ $volunteer->phone }}</td>
            <td>{{ $volunteer->field_of_interest }}</td>
        </tr>
    @endforeach
    </tbody>
</table>