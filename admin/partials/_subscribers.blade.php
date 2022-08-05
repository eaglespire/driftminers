<div class="row">
    <div class="col-md-12">
         <div class="card card-body bg-secondary">
             <div class="table-responsive">
                 <table class="table">
                     <thead class="bg-dark">
                     <tr>
                         <th scope="col" class="align-middle">Name</th>
                         <th scope="col" class="align-middle">Email</th>
                         <th scope="col" class="align-middle">Plan</th>
                         <th scope="col" class="align-middle">Minimum Amount</th>
                         <th scope="col" class="align-middle">Amount Invested</th>
                         <th scope="col" class="align-middle">Status</th>
                         <th scope="col" class="align-middle">Start Date</th>
                         <th scope="col" class="align-middle">End Date</th>
                         <th scope="col" class="align-middle">Action</th>
                     </tr>
                     </thead>
                     @if(count($subscribers) != 0)
                         <tbody>
                         @foreach($subscribers as $subscriber)
                             <tr>
                                 <td class="align-middle">{{ $subscriber->user->name }}</td>
                                 <td class="align-middle">{{ $subscriber->user->email }}</td>
                                 <td class="align-middle">{{ $subscriber->plan->name }}</td>
                                 <td class="align-middle">$ {{ number_format($subscriber->plan->minimum_investment) }}</td>
                                 <td class="align-middle">$ {{ number_format($subscriber->amount) }}</td>
                                 <td class="align-middle">
                                     @if($subscriber->confirm_subscription)
                                         <span class="badge badge-success">active</span>
                                     @else
                                         <span class="badge badge-danger">inactive</span>
                                     @endif
                                 </td>
                                 <td class="align-middle">{{ $subscriber->confirm_subscription ? $subscriber->start_date->toFormattedDateString() : 'NULL' }}</td>
                                 <td class="align-middle">{{ $subscriber->confirm_subscription ? $subscriber->end_date->toFormattedDateString() : 'NULL' }}</td>
                                 <td>
                                     <div class="btn-group" role="group">
                                         @if(!$subscriber->confirm_subscription)
                                             <form action="{{ route('activate_subscription', $subscriber->id) }}" class="form-inline" method="post">
                                                 @csrf
                                                 <button class="btn btn-success" type="submit" onclick="return confirm('Activate Subscription?')">Activate</button>
                                             </form>
                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelSubscriptionModal">
                                                 Reject
                                             </button>
                                         @else
                                             <form action="{{ route('cancel_subscription', $subscriber->id) }}" class="form-inline" method="post">
                                                 @csrf
                                                 @method('delete')
                                                 <button onclick="return confirm('Are you sure you want to proceed?')" class="btn btn-danger" type="submit">Cancel</button>
                                             </form>
                                             <a href="{{ route('subscriber', $subscriber->id) }}" class="btn btn-primary">View</a>
                                         @endif
                                     </div>
                                 </td>
                             </tr>
                             @include('partials.updates._reject_subscription')
                         @endforeach
                         </tbody>
                     @endif
                 </table>
             </div>
         </div>
    </div>
</div>

