 @if ($query->status == 0)
     <span class="badge badge-secondary px-2 py-1">Pending</span>
 @elseif ($query->status == 1)
     <span class="badge badge-warning px-2 py-1">In Progress</span>
 @elseif ($query->status == 2)
     <span class="badge badge-success px-2 py-1">Approved</span>
 @elseif ($query->status == 3)
     <span class="badge badge-danger px-2 py-1">Declined</span>
 @endif
