<div class="further">

    <section>

        <h3>Go further</h3>

        <?php if (!empty($jobs) && is_array($jobs)) : ?>
            <h4>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                    <rect x='32' y='96' width='64' height='368' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                    <line x1='112' y1='224' x2='240' y2='224' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                    <line x1='112' y1='400' x2='240' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                    <rect x='112' y='160' width='128' height='304' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                    <rect x='256' y='48' width='96' height='416' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                    <path d='M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                </svg>
                <?= esc($jobs['nama_pekerjaan']) ?>
            </h4>

            <div class="main">
                <?= esc($jobs['kota']) ?>
            </div>
            <p>
                <a href="/jobs">Kembali ke beranda</a>
            </p>

        <?php else : ?>

            <h4>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                    <line x1='176' y1='48' x2='336' y2='48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px' />
                    <line x1='118' y1='304' x2='394' y2='304' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px' />
                    <path d='M208,48v93.48a64.09,64.09,0,0,1-9.88,34.18L73.21,373.49C48.4,412.78,76.63,464,123.08,464H388.92c46.45,0,74.68-51.22,49.87-90.51L313.87,175.66A64.09,64.09,0,0,1,304,141.48V48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px' />
                </svg>
                No Jobs
            </h4>
            <p>
                Unable to find any jobs for you.
                <a href="#">join us</a> ?
            </p>

        <?php endif ?>

    </section>

</div>