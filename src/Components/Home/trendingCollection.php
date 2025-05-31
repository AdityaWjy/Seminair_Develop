<?php include(__DIR__ . '/../../../config.php'); ?>

<?php

$sql = "SELECT * FROM event where id_kategori = 3 ORDER BY id_event DESC LIMIT 3";
$query = mysqli_query($db, $sql);

while ($event = mysqli_fetch_assoc($query)) {
    $id_event = $event['id_event'];
    $event_name = $event['nama_event'];
    $event_img = $event['gambar_event'];
    $event_date = date('d M Y', strtotime($event['tgl_event']));
    $event_location = $event['lokasi_event'];
    $organizer_event = $event['penyelenggara_event'];
    $type_event = $event['tipe_event'];

    echo '
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="../../assets/img/events/' . $event_img . '" class="card-img-top" alt="' . $event_name . '">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="text-paragraph text-primary fw-semibold">
                        <i class="text-primary bi bi-geo-alt-fill"></i> <span>' . $event_location . '</span>
                    </div>
                    <div class="text-paragraph text-primary fw-semibold">
                        <i class="bi bi-calendar2-plus-fill"></i> <span>' . $event_date . '</span>
                    </div>
                </div>
                <h5 class="card-title">' . $event_name . '</h5>
                <p class="card-text">' . $organizer_event . '</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light">
               <a href="/src/views/detailEvent.php?id=' . $id_event . '" class="btn btn-dark btn-sm">More Details</a>
               <button class="btn btn-dark btn-sm rounded-circle like-button"><i class="bi bi-heart"></i></button>
            </div>
        </div>
    </div>';
}


?>

<style>
    .like-button {
        border: none;
        background-color: rgba(0, 0, 0, 0.67);
        transition: background 0.2s, transform 0.2s;
    }

    .like-button:hover {
        background-color: rgba(0, 0, 0, 0.83);
        transition: background 0.2s, transform 0.2s;
    }

    .like-button i {
        color: white;
        transition: color 0.3s;
    }


    .like-button.liked i {
        color: #ff4d6d;
    }
</style>

<script>
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function() {
            const icon = this.querySelector('i');
            this.classList.toggle('liked');

            if (this.classList.contains('liked')) {
                icon.classList.remove('bi-heart');
                icon.classList.add('bi-heart-fill');
            } else {
                icon.classList.remove('bi-heart-fill');
                icon.classList.add('bi-heart');
            }
        });
    });
</script>