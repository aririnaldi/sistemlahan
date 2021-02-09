<div class="col-md-12">
    <div class="form-group">
        <label for="nama_tanaman">Nama Tanaman</label>
        <div class="form-line">
            <input type="text" id="nama_tanaman" class="form-control" name="nama_tanaman" placeholder="Masukan Nama Tanaman" required>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="tekstur">Pembobotan Tekstur Tanah</label>
        <?php if (isset($array_tekstur)): ?>
            <?php foreach ($array_tekstur as $key => $item): ?>

                <input type="hidden" name="tekstur[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-8">
                        <div class="form-line">
                            <select name="tekstur[<?= $key ?>][nama]" class="form-control" required>
                                <?php foreach ($pusatdata->pilihanTekstur() as $tekstur): ?>
                                    <option value="<?= $tekstur ?>" <?= ($tekstur == $item['nama']) ? "selected" : "" ?> ><?= $tekstur ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="tekstur[<?= $key ?>][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-tekstur">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if ($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-tekstur">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-line">
                        <select name="tekstur[0][nama]" class="form-control" required>
                            <?php foreach ($pusatdata->pilihanTekstur() as $tekstur): ?>
                                <option value="<?= $tekstur ?>"><?= $tekstur ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="tekstur[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-tekstur">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="ph">Pembobotan pH</label>
        <?php if (isset($array_ph)): ?>
            <?php foreach ($array_ph as $key => $item): ?>

                <input type="hidden" name="ph[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="ph[0][min]" placeholder="Masukan pH Minimum" value="<?= $item['min_ph'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="ph[0][maks]" placeholder="Masukan pH Maksimum" value="<?= $item['maks_ph'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="ph[0][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-ph">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if ($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-ph">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ph[0][min]" placeholder="Masukan pH Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ph[0][maks]" placeholder="Masukan pH Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ph[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-ph">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="drainase">Pembobotan Drainase</label>
        <?php if (isset($array_drainase)): ?>
            <?php foreach ($array_drainase as $key => $item): ?>
                <input type="hidden" name="drainase[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-8">
                        <div class="form-line">
                            <select name="drainase[<?= $key ?>][nama]" class="form-control" required>
                                <?php foreach ($pusatdata->pilihanDrainase() as $key => $drainase): ?>
                                    <option value="<?= $drainase ?>" <?= ($drainase == $item['nama']) ? "selected" : "" ?>><?= $drainase ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="drainase[<?= $key ?>][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-drainase">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if ($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-drainase">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-line">
                        <select name="drainase[0][nama]" class="form-control" required>
                            <?php foreach ($pusatdata->pilihanDrainase() as $key => $drainase): ?>
                                <option value="<?= $drainase ?>"><?= $drainase ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="drainase[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-drainase">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="suhu">Pembobotan Suhu</label>
        <?php if (isset($array_suhu)): ?>
            <?php foreach ($array_suhu as $key => $item): ?>
                <input type="hidden" name="suhu[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="suhu[0][min]" placeholder="Masukan Suhu Minimum" value="<?= $item['min_suhu'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="suhu[0][maks]" placeholder="Masukan Suhu Maksimum" value="<?= $item['maks_suhu'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="suhu[0][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-suhu">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if ($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-suhu">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="suhu[0][min]" placeholder="Masukan Suhu Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="suhu[0][maks]" placeholder="Masukan Suhu Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="suhu[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-suhu">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="ketinggian">Pembobotan Ketinggian</label>
        <?php if (isset($array_ketinggian)): ?>
            <?php foreach ($array_ketinggian as $key => $item): ?>
                <input type="hidden" name="ketinggian[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="ketinggian[0][min]" placeholder="Masukan Ketinggian Lahan Minimum" value="<?= $item['min_tinggi'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="ketinggian[0][maks]" placeholder="Masukan Ketinggian Lahan Maksimum" value="<?= $item['maks_tinggi'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="ketinggian[0][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-ketinggian">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if ($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-ketinggian">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ketinggian[0][min]" placeholder="Masukan Ketinggian Lahan Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ketinggian[0][maks]" placeholder="Masukan Ketinggian Lahan Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ketinggian[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-ketinggian">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="lereng">Pembobotan Lereng</label>
        <?php if (isset($array_lereng)): ?>
            <?php foreach ($array_lereng as $key => $item): ?>
                <input type="hidden" name="lereng[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="lereng[0][min]" placeholder="Masukan Lereng Minimum" value="<?= $item['min_lereng'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="lereng[0][maks]" placeholder="Masukan Lereng Maksimum" value="<?= $item['maks_lereng'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="lereng[0][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-lereng">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-lereng">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="lereng[0][min]" placeholder="Masukan Lereng Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="lereng[0][maks]" placeholder="Masukan Lereng Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="lereng[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-lereng">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="hujan">Pembobotan Curah Hujan</label>
        <?php if (isset($array_hujan)): ?>
            <?php foreach ($array_hujan as $key => $item): ?>
                <input type="hidden" name="hujan[<?= $key ?>][id]" value="<?= $item['id'] ?>" required>
                <div class="row" data-id="<?= $item['id'] ?>">
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="hujan[0][min]" placeholder="Masukan Curah Hujan Minimum" value="<?= $item['min_curah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="hujan[0][maks]" placeholder="Masukan Curah Hujan Maksimum" value="<?= $item['maks_curah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-line">
                            <input type="number" min="0" class="form-control" name="hujan[0][bobot]" placeholder="Bobot" value="<?= $item['bobot'] ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-primary add-hujan">
                            <i class="fa fa-plus"></i>
                        </button>

                        <?php if ($key != 0): ?>
                            <button type="button" class="btn btn-danger delete-hujan">
                                <i class="fa fa-minus"></i>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="hujan[0][min]" placeholder="Masukan Curah Hujan Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="hujan[0][maks]" placeholder="Masukan Curah Hujan Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="hujan[0][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-hujan">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<br>
<input type="submit" name="submit" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold" value="SAVE">
<a href="?page=alternatif" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>

<script type="text/javascript">

$(function(){
    $(document).on('click', '.add-tekstur', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-line">
                        <select name="tekstur[`+ rowCount +`][nama]" class="form-control" required>
                            <?php foreach ($pusatdata->pilihanTekstur() as $tekstur): ?>
                                <option value="<?= $tekstur ?>"><?= $tekstur ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="tekstur[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-tekstur">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-tekstur">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-tekstur', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax tekstur');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });

    $(document).on('click', '.add-ph', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ph[`+ rowCount +`][min]" placeholder="Masukan pH Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ph[`+ rowCount +`][maks]" placeholder="Masukan pH Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ph[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-ph">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-ph">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-ph', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax ph');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });

    $(document).on('click', '.add-drainase', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-line">
                        <select name="drainase[`+ rowCount +`][nama]" class="form-control" required>
                            <?php foreach ($pusatdata->pilihanDrainase() as $key => $drainase): ?>
                                <option value="<?= $drainase ?>"><?= $drainase ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="drainase[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-drainase">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-drainase">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-drainase', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax drainase');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });

    $(document).on('click', '.add-suhu', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="suhu[`+ rowCount +`][min]" placeholder="Masukan Suhu Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="suhu[`+ rowCount +`][maks]" placeholder="Masukan Suhu Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="suhu[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-suhu">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-suhu">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-suhu', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax suhu');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });

    $(document).on('click', '.add-ketinggian', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ketinggian[`+ rowCount +`][min]" placeholder="Masukan Ketinggian Lahan Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ketinggian[`+ rowCount +`][maks]" placeholder="Masukan Ketinggian Lahan Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="ketinggian[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-ketinggian">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-ketinggian">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-ketinggian', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax ketinggian');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });

    $(document).on('click', '.add-lereng', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="lereng[`+ rowCount +`][min]" placeholder="Masukan Lereng Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="lereng[`+ rowCount +`][maks]" placeholder="Masukan Lereng Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="lereng[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-lereng">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-lereng">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-lereng', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax lereng');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });

    $(document).on('click', '.add-hujan', function(e){
        e.preventDefault();
        var _ = $(this),
            formGroup = _.closest('.form-group'),
            rowCount = formGroup.find('> .row').length + 1;

        formGroup.append(`
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="hujan[`+ rowCount +`][min]" placeholder="Masukan Curah Hujan Minimum" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="hujan[`+ rowCount +`][maks]" placeholder="Masukan Curah Hujan Maksimum" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-line">
                        <input type="number" min="0" class="form-control" name="hujan[`+ rowCount +`][bobot]" placeholder="Bobot" required>
                    </div>
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary add-hujan">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete-hujan">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.delete-hujan', function(e){
        e.preventDefault();
        var _ = $(this),
            rowElement = _.closest('.row'),
            formGroup = _.closest('.form-group');

        if (!! rowElement.attr('data-id')) {
            // data ada di database
            console.log('ajax hujan');
        }else{
            // data tidak ada di database
            rowElement.remove();
        }
    });
});

</script>
