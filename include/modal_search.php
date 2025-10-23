<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <form action="search.php" method="GET" class="w-75 mx-auto d-flex">
                    <div class="input-group">
                        <input type="search" name="keyword" class="form-control p-3" placeholder="Cari produk..." required>
                        <button type="submit" class="input-group-text p-3 btn btn-primary">
                            <i class="fa fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->