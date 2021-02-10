<div class="form-group">
    <label for="alamat">Alamat</label>
    <div class="form-line">
        <input type="text" required id="alamat" class="form-control" name="alamat" placeholder="Masukan Alamat" value="<?= (isset($data['alamat'])) ? $data['alamat'] : '' ?>">

        <?php if (isset($data)): ?>
            <input type="hidden" name="id_alamat" value="<?= $data['id_alamat'] ?>">
        <?php endif; ?>
    </div>
</div>

<div class="form-group">
    <label>Tekstur Tanah</label>
    <select name="tekstur" class="form-control">
        <?php foreach ($pusatdata->pilihanTekstur() as $key => $value): ?>
            <option value="<?= $value ?>" <?= (isset($data['tekstur']) && $data['tekstur'] == $value) ? 'selected' : '' ?>><?= $value ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="ph">pH</label>
    <div class="form-line">
        <input type="text" id="ph" class="form-control" name="ph" placeholder="Masukan pH" value="<?= (isset($data['ph'])) ? $data['ph'] : '' ?>">
    </div>
</div>

<div class="form-group">
    <label for="drainase">Drainase</label>
    <select name="drainase" class="form-control">
        <?php foreach ($pusatdata->pilihanDrainase() as $key => $value): ?>
            <option value="<?= $value ?>" <?= (isset($data['drainase']) && $data['drainase'] == $value) ? 'selected' : '' ?>><?= $value ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="suhu">Suhu</label>
    <div class="form-line">
        <input type="text" id="suhu" class="form-control" name="suhu" placeholder="Masukan Suhu" value="<?= (isset($data['suhu'])) ? $data['suhu'] : '' ?>">
    </div>
</div>

<div class="form-group">
    <label for="ketinggian">Ketinggian</label>
    <div class="form-line">
        <input type="number" id="ketinggian" class="form-control" name="ketinggian" placeholder="Masukan Ketinggian" value="<?= (isset($data['ketinggian'])) ? $data['ketinggian'] : '' ?>">
    </div>
</div>

<div class="form-group">
    <label for="lereng">Lereng</label>
    <div class="form-line">
        <input type="text" id="lereng" class="form-control" name="lereng" placeholder="Masukan Lereng" value="<?= (isset($data['lereng'])) ? $data['lereng'] : '' ?>">
    </div>
</div>

<div class="form-group">
    <label for="curah_hujan">Curah Hujan</label>
    <div class="form-line">
        <input type="number" id="curah_hujan" class="form-control" name="curah_hujan" placeholder="Masukan Curah Hujan" value="<?= (isset($data['curah_hujan'])) ? $data['curah_hujan'] : '' ?>">
    </div>
</div>
