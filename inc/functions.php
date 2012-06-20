<?

Class File
{
    private $file,$handler,$size;
    
    public function __Construct( $file )
    {
        $this->file = $file;
        $this->size = filesize($this->file);
    }
    
    public function Read()
    {
        if($this->size > 0)
        {
            $this->Open();
            $data = fread($this->handler, $this->size);
            $this->Close();
        }
        
        return $data;
    }
    
    public function Write( $contents )
    {
        $this->Open('w');
        fwrite($this->handler, $contents);
        $this->Close();
    }
    
    private function Open( $type = 'r' )
    {
        $this->handler = fopen($this->file, $type);
    }
    
    private function Close()
    {
        fclose($this->handler);
    }
}