
<x-app-layout :assets="$assets ?? []">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>skill list
                    <a href="{{url('create-skill')}}" class="btn btn-primary float-end" >Add skill</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-boarded table-striped">
                        <thead>
                        <tr>
                            <th>order</th>
                            <th>Skill</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($skills as $skill)
                        <tr>
                            <td>{{$skill->id}}</td>
                            <td>{{$skill->name}}</td>
                          <td>
                              @if($skill->image)
                                  <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" width="150">
                              @endif
                          </td>
                            <td>
                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-skill-{{ $skill->id }}').submit(); }">
                                    Delete
                                </a>

                                <!-- Hidden form -->
                                <form id="delete-skill-{{ $skill->id }}" action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const skillId = this.getAttribute('data-id');
                    const url = this.getAttribute('data-url');

                    if (confirm('Are you sure you want to delete this skill?')) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;
                        form.style.display = 'none';

                        const csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = document.querySelector('meta[name="csrf-token"]').content;

                        const method = document.createElement('input');
                        method.type = 'hidden';
                        method.name = '_method';
                        method.value = 'DELETE';

                        form.appendChild(csrf);
                        form.appendChild(method);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
