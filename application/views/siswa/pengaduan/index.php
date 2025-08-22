<h3>My Complaints</h3>
<a href="<?= site_url('siswa/pengaduan/create'); ?>" class="btn btn-primary mb-3">Add New Complaint</a>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengaduan_list as $p): ?>
            <tr>
                <td><?= $p->date; ?></td>
                <td><?= $p->judul; ?></td>
                <td><?= $p->nama_kategori; ?></td>
                <td><?= ($p->konfirmasi == '1') ? '<span class="badge badge-success">Confirmed</span>' : '<span class="badge badge-warning">Pending</span>'; ?>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>