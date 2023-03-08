




<form action="{{ route('locale.set', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="nav-link bg-light nav-active" style="backhround: transparent; border:none">
        <span class="flag-icon flag-icon-{{ $country }}"></span>
    </button>
</form>
