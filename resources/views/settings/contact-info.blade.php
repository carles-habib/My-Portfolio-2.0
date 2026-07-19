<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Info</h4>
                    </div>
                    <div class="card-body">
                        @if($contactInfo)
                            <div class="form-group">
                                <label>Phone</label>
                                <p>{{ $contactInfo->phone }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <p>{{ $contactInfo->email }}</p>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <p>{{ $contactInfo->address }}</p>
                            </div>
                        @else
                            <p>No contact info has been added yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
