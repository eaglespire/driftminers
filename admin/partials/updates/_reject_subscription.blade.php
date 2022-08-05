<div class="modal fade" tabindex="-1" id="cancelSubscriptionModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">Reject Subscription and message client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reject_subscription', $subscriber->id) }}" class="form-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="" class="form-label text-dark">Send a Message to the Client</label>
                        <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Reject This SubscriptionFacade?')">Reject and Send Message</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>

        </div>
    </div>
</div>
