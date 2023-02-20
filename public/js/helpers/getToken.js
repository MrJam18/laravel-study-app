const getToken = () => {
    return {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')};
}
