<title>File Operation</title>
<pre>

<?php

class fileOperation
{
    protected $resource;

    public function __construct($file, $mode)
    {
        $this->resource = fopen($file, $mode);
    }

    public function fileWrite($message)
    {
        fwrite($this->resource, $message);
    }

    public function fileRead()
    {
        rewind($this->resource);
        $content = '';

        while (!feof($this->resource)) {
            $content .= fgets($this->resource);
        }

        return $content;
    }

    public function __destruct()
    {
        fclose($this->resource);
    }
}

$fileo = new fileOperation('index.txt', 'w+');
$fileo->fileWrite("This is line one.\nThis is line two.\n");
echo $fileo->fileRead();
