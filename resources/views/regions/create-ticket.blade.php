<div class="panel panel-default">
    <div class="panel-heading">Create new ticket</div>
    <div class="panel-body">
        <div class="alert alert-@{{ newTicket.alert.type }}"
         ng-show="newTicket.alert.show"
         ng-bind-html="newTicket.alert.message"
        ></div>

        <form class="form" ng-submit="createNewTicket()" onSubmit="javascript: void(0)">
            <div class="form-group">
                <label class="control-label">First name</label>
                <input
                 type="text"
                 name="first_name"
                 class="form-control"
                 placeholder=""
                 ng-model="newTicket.firstName"
                />
            </div>
            <div class="form-group">
                <label class="control-label">Last name</label>
                <input
                 type="text"
                 name="last_name"
                 class="form-control"
                 placeholder=""
                 ng-model="newTicket.lastName"
                />
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input
                 type="email"
                 name="email"
                 class="form-control"
                 placeholder=""
                 ng-model="newTicket.email"
                />
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-primary" ng-click="createNewTicket()">
                    <i class="glyphicon glyphicon-plus"></i> Create new ticket
                </button>
            </div>
        </form>
    </div>
</div>
