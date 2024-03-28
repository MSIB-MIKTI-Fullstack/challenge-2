<?php

class Orang
{
    public function __construct(
        public string $nama,
        public int $berat,
        public float $tinggi
    ) {
    }

    public function Nama(): string
    {
        return $this->nama;
    }

    public function Berat(): int
    {
        return $this->berat;
    }

    public function Tinggi(): float
    {
        return $this->tinggi;
    }

    public function BMI(): float
    {
        return round($this->berat / pow($this->tinggi, 2), 2);
    }
}

class Hasil
{
    public function __construct(
        public Orang $orang1,
        public Orang $orang2
    ) {
    }

    public function HTML(): void
    {
        $markHigherBMI = $this->orang1->BMI() > $this->orang2->BMI() ? 'true' : 'false';

        echo "<h4>{$this->orang1->Nama()}:</h4>";
        echo "Tinggi: {$this->orang1->Tinggi()} kg <br>";
        echo "Berat: {$this->orang1->Berat()} m <br>";
        echo "<h4>{$this->orang2->Nama()}:</h4>";
        echo "Tinggi: {$this->orang2->Tinggi()} kg <br>";
        echo "Berat: {$this->orang2->Berat()} m <br>";
        echo "<h4>Hasil BMI</h4>";
        echo "{$this->orang1->Nama()}: {$this->orang1->BMI()} <br>";
        echo "{$this->orang2->Nama()}: {$this->orang2->BMI()} <br>";
        echo "<h4>{$this->orang1->Nama()} memiliki BMI lebih tinggi dari {$this->orang2->Nama()} : {$markHigherBMI}</h4>";
        echo "========================= <br>";
    }
}

// Data 1
echo "<h2>Data 1</h2>";
$mark = new Orang("Mark", 78, 1.69);
$john = new Orang("John", 92, 1.95);
$hasil = new Hasil($mark, $john);
$hasil->HTML();

// Data 2
echo "<h2>Data 2</h2>";
$mark = new Orang("Mark", 95, 1.88);
$john = new Orang("John", 85, 1.76);
$hasil = new Hasil($mark, $john);
$hasil->HTML();
