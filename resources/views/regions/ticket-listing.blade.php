<div class="panel panel-default">
    <div class="panel-heading">Tickets</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ticket ID.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date created</th>
                        <th>Redeemed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                     ng-repeat="ticket in tickets"
                     class="@{{ $first && 'first' || '' }}@{{ $last && 'last' || '' }}"
                    >
                        <td>@{{ ticket.id }}</td>
                        <td>@{{ ticket.first_name }}</td>
                        <td>@{{ ticket.last_name }}</td>
                        <td>@{{ ticket.email }}</td>
                        <td>@{{ ticket.created_at }}</td>
                        <td>@{{ ticket.redeemed && 'true' || 'false' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
