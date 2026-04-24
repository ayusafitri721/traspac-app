<?php

namespace App\Services;

class ArticleService
{
    public function getArticle(): string
    {
        return <<<'TEXT'
SISKO adalah sistem informasi sekolah yang membantu pengelolaan data akademik, administrasi, dan komunikasi di lingkungan pendidikan. Dalam penerapan di sekolah-sekolah, SISKO digunakan untuk mempercepat proses input nilai, absensi, jadwal pelajaran, hingga laporan kepada orang tua.

Di era pendidikan digital, SISKO menjadi bagian penting karena sekolah membutuhkan sistem yang efisien, transparan, dan mudah digunakan. Guru dapat mengakses data siswa, memperbarui informasi pembelajaran, dan memantau perkembangan akademik secara lebih terstruktur. Sementara itu, siswa dan orang tua memperoleh informasi yang lebih cepat dan akurat.

Penerapan SISKO juga mendukung transformasi digital dalam dunia pendidikan. Dengan teknologi ini, sekolah dapat mengurangi penggunaan kertas, meminimalkan kesalahan administrasi, dan mempercepat layanan akademik. Selain itu, SISKO dapat diintegrasikan dengan berbagai modul lain seperti perpustakaan, keuangan, dan manajemen pegawai.

Namun, implementasi SISKO memerlukan kesiapan sumber daya manusia, infrastruktur jaringan, dan pelatihan pengguna. Tanpa dukungan tersebut, sistem yang canggih sekalipun tidak akan berjalan optimal. Oleh karena itu, sekolah perlu menyiapkan strategi implementasi yang matang agar manfaat SISKO dapat dirasakan secara maksimal.

Secara keseluruhan, SISKO merupakan solusi teknologi pendidikan yang relevan untuk meningkatkan kualitas layanan sekolah. Dengan pemanfaatan yang tepat, SISKO mampu membantu sekolah menjadi lebih efektif, efisien, dan responsif terhadap kebutuhan akademik modern.
TEXT;
    }

    public function countWordOccurrences(string $article, string $word): int
    {
        $pattern = '/' . preg_quote($word, '/') . '/i';
        preg_match_all($pattern, $article, $matches);

        return count($matches[0]);
    }

    public function replaceWord(string $article, string $search, string $replace): string
    {
        return str_ireplace($search, $replace, $article);
    }

    public function highlightWord(string $article, string $word, string $color): string
    {
        if ($word === '') {
            return e($article);
        }

        $escapedWord = preg_quote($word, '/');
        $replacement = '<mark style="background:' . $color . ';">$0</mark>';

        return preg_replace('/(' . $escapedWord . ')/i', $replacement, e($article));
    }

    public function sortUniqueWords(string $article): array
    {
        $words = explode(' ', $article);
        $cleaned = [];

        foreach ($words as $word) {
            $word = preg_replace('/[^\p{L}\p{N}]+/u', '', $word);
            $word = trim((string) $word);
            if ($word !== '') {
                $cleaned[] = $word;
            }
        }

        $uniqueWords = array_unique($cleaned);
        natcasesort($uniqueWords);

        return array_values($uniqueWords);
    }
}
