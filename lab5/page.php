<?php
class Page
{
    private string $page;
    private string $title;
    private int $year;
    private string $copyright;
    private const SPECIALC = array("&", "\"", "'", "<", ">");
    private const REPLACEC = array("&amp;", "&quot;", "&#039;", "&lt;", "&gt;");

    public function __construct()
    {
        $this->page = '';
        $this->title = 'Auto create';
        $this->year = date('Y');
        $this->copyright = 'sPotato';
    }
    private function addHeader()
    {
        $this->page = "<header>" . $this->year . "</header>" . $this->page;
    }
    private function addFooter()
    {
        $this->page =   $this->page . "<footer>Copyright: " . $this->copyright . "</footer>";
    }
    public function addContent(string $content)
    {
        $this->page = $this->page . $content;
    }
    public function get(): string
    {

        $this->addHeader();
        $this->addFooter();
        $this->page = "<title>".$this->title."</title>".$this->page;
        str_replace($this::SPECIALC, $this::REPLACEC, $this->page);
        return $this->page;
    }
}

?>
<header></header>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="content" placeholder="input here">
    <input type="submit" value="create" name="submit" />
    <input type="submit" value="clear" name="clear" />
</form>

<?php
if (isset($_POST["submit"])) {
    $submitted = $_POST["submit"];
    $content = $_POST["content"];
    $file = fopen('data.txt', 'a');
    fwrite($file, $content."\n");
    fclose($file);
} else if (isset($_POST["clear"])) {
    $file = fopen('data.txt', 'w');
    fclose($file);
}

$pages = array();
if (file_exists('data.txt')) {
    foreach (explode("\n", file_get_contents('data.txt')) as $content) {
        if ($content == ''){
            continue;
        }
        $page = new Page();
        $page->addContent($content);
        array_push($pages, $page);
    }
}

foreach ($pages as $page) {
    echo "<a onclick=\"newPage('" . $page->get() . "')\" href=#>Page</a>";
}
?>

<script>
    function newPage(page) {
        var myWindow = window.open('', '_blank');
        myWindow.document.write(page).text();
    }
</script>