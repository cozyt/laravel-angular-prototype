<div>
    <div
     class="alert alert-@{{ ticketRedemption.alert.type }}"
     ng-show="ticketRedemption.alert.show"
     ng-bind-html="ticketRedemption.alert.message"
    ></div>

    <form class="form-inline  text-right" ng-submit="redeemTicket()" onSubmit="javascript: void(0)">
        <div class="form-group">
            <input
             type="search"
             name="ticket_id"
             class="form-control"
             placeholder="Redeem ticket"
             ng-model="ticketRedemption.id"
            />
            <button type="button" class="btn btn-primary" ng-click="redeemTicket()">
                <i class="glyphicon glyphicon-thumbs-up"></i>
            </button>
        </div>
    </form>
</div>
