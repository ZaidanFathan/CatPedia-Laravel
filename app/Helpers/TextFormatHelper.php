<?php 
    function formatParagraphs($text)
    {

        $sentences = explode('.', $text);

        $formatted = '';

        foreach ($sentences as $sentence) {
            $sentence = trim($sentence); 
            if (!empty($sentence)) {
                $formatted .= '<p>' . $sentence . '.</p>';
            }
        }

        return $formatted;
    }

?>