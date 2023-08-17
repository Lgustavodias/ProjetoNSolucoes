<?php

class FileUpload
{
    /** @var string */
    private $destination;

    /** @var array */
    private $mimeTypes;

    /**
     * Construtor da Classe
     *
     * @param string $destination
     * @param array $mimeTypes
     */
    public function __construct($destination, $mimeTypes)
    {
        $this->destination = $destination;
        $this->mimeTypes = $mimeTypes;
    }

    /**
     * Move o arquivo para a pasta do servidor
     *
     * @param mixed $file
     * @return string
     */
    public function moveFile($file)
    {
        try
        {
            $fileInfo = $this->fileInfo($file);
            $hash = uniqid();

            $currentDateTime = date("YmdHis");
            $nameFile = $currentDateTime . "_" . $hash . "." . $fileInfo["fileExtension"];
            $fileDestination = $_SERVER["DOCUMENT_ROOT"] . $this->destination . "/" . $nameFile;

            if (!move_uploaded_file($fileInfo["fileLocation"], $fileDestination))
            {
                throw new Exception("ERRO_AO_MOVER_ARQUIVO");
            }

            return $this->destination . "/" . $nameFile;
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Aplica filtros ao arquivo
     *
     * @param mixed $file
     * @return array
     */
    private function fileInfo($file)
    {
        if (!isset($file) || (isset($file) && !is_file($file["tmp_name"])))
        {
            throw new Exception("ARQUIVO_NAO_EXISTE_OU_E_NULO");
        }

        if (!in_array(strtolower(pathinfo($file["name"], PATHINFO_EXTENSION)), $this->mimeTypes))
        {
            throw new Exception("TIPO_DE_ARQUIVO_NAO_ACEITO");
        }

        return [
            "filename" => pathinfo($file["name"], PATHINFO_FILENAME),
            "fileExtension" => pathinfo($file["name"], PATHINFO_EXTENSION),
            "fileLocation" =>  $file["tmp_name"],
        ];
    }
}