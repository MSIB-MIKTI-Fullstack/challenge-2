<?php

class Tim
{
    public $skor;

    public function __construct(
        public string $nama,
        int ...$skor
    ) {
        $this->skor = $skor;
    }

    public function Nama(): string
    {
        return $this->nama;
    }

    public function Skor(): string
    {
        return '(' . implode(', ', $this->skor) . ')';
    }

    public function Poin(): float
    {
        $total = 0;

        foreach ($this->skor as $skor) {
            $total += $skor;
        }

        return round($total / count($this->skor), 2);
    }
}

class Hasil
{
    public function __construct(
        public Tim $tim1,
        public Tim $tim2
    ) {
    }

    public function Pemenang(): string
    {
        if ($this->tim1->Poin() > $this->tim2->Poin() && $this->tim1->Poin() >= 100) {
            return "Tim {$this->tim1->Nama()} menang";
        }

        if ($this->tim2->Poin() > $this->tim1->Poin() && $this->tim2->Poin() >= 100) {
            return "Tim {$this->tim2->Nama()} menang";
        }

        if ($this->tim1->Poin() == $this->tim2->Poin() && ($this->tim1->Poin() >= 100 && $this->tim2->Poin() >= 100)) {
            return "Tim Seri";
        }

        return "Tidak ada tim yang memenangkan trofi";
    }

    public function HTML(): void
    {
        echo "{$this->tim1->Nama()} {$this->tim1->Skor()} : " . $this->tim1->Poin() . "<br>";
        echo "{$this->tim2->Nama()} {$this->tim2->Skor()} : " . $this->tim2->Poin() . "<br>";
        echo "Hasil : " . $this->Pemenang() . "<br>";
        echo "========================= <br>";
    }
}

// Data 1
echo "<h3>Data 1</h3>";
$lumba = new Tim("Lumba-Lumba", 97, 108, 89);
$koala = new Tim("Koala", 89, 91, 110);
$hasil = new Hasil($lumba, $koala);
$hasil->HTML();

// Data Bonus 1
echo "<h3>Data Bonus 1</h3>";
$lumba = new Tim("Lumba-Lumba", 97, 112, 101);
$koala = new Tim("Koala", 109, 95, 123);
$hasil = new Hasil($lumba, $koala);
$hasil->HTML();

// Data Bonus 2
echo "<h3>Data Bonus 2</h3>";
$lumba = new Tim("Lumba-Lumba", 97, 112, 101);
$koala = new Tim("Koala", 109, 95, 106);
$hasil = new Hasil($lumba, $koala);
$hasil->HTML();
