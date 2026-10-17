<a href="{{ route($route . '.show', $item) }}" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i> Show</a>
<a href="{{ route($route . '.edit', $item) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
<form action="{{ route($route . '.destroy', $item) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
</form>