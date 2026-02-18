<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">ContactUs form</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="#" method="get">
                                <table class="table table-boarded">
                                    <thead>
                                    <tr>
                                            <th class="text-center">
                                                First Name

                                            </th>
                                        <th class="text-center">
                                            Last Name

                                        </th>
                                        <th class="text-center">
                                            Email

                                        </th>

                                        <th class="text-center">
                                            Phone

                                        </th>
                                        <th class="text-center">
                                            service

                                        </th>
                                        <th class="text-center">
                                            message

                                        </th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach ($inboxes as $message)

                                            <td>
                                                {{ $message->firstName }}

                                            </td>

                                            <td>
                                                {{ $message->lastName }}

                                            </td>

                                            <td>
                                                {{ $message->email }}

                                            </td>

                                            <td>
                                                {{ $message->phone }}

                                            </td>

                                            <td>
                                                {{ $message->service }}

                                            </td>

                                            <td>
                                                {{ $message->message }}

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
