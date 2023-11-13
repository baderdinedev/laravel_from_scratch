<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width,
initial-scale=1.0">
@vite(['resources/css/app.css', 'resources/js/app.js' ])
<link rel=" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <title>Tags
</title> </head> <body> @include('layouts.navigation') <div class="container text-center"> <h1> 🚀 Tags 🚀</h1> <button
    type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTagModal"> <i class="fas
            fa-plus"></i> Ajouter un Tag </button> 
         <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog"
            aria-labelledby=" addTagModalLabel" aria-hidden=" true">
    <div class=" modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header">
        <h5 class="modal-title" id="addTagModalLabel">Ajouter un Tag
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">
                &times;</span> </button>
                </div>
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Add your form fields for creating a new tag here -->
                        <div class="form-group">
                            <label for="name">Nom du Tag</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
    </div>
    </div>
    </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this tag?');">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>

    </html>