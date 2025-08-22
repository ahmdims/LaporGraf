<h3>Make a New Complaint</h3>

<?= form_open('siswa/pengaduan/store'); ?>
<div class="form-group">
    <label>Title</label>
    <input type="text" name="judul" class="form-control" required>
</div>
<div class="form-group">
    <label>Category</label>
    <select name="id_kategori" class="form-control" required>
        <option value="">-- Select Category --</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label>Location of Incident</label>
    <input type="text" name="tempat" class="form-control" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="<?= site_url('siswa/pengaduan'); ?>" class="btn btn-secondary">Cancel</a>
<?= form_close(); ?>