<?php 
    require_once(SERVER_ROOT . 'tcpdf/tcpdf.php');
    require_once(SERVER_ROOT . 'models/hat_talalatos_query.php');
    function make_pdf($start_year, $end_year, $money) 
    {
        $result = hat_talalatos($start_year, $end_year, $money);
        $html = '
                    <html>
                        <head>
                        </head>
                        <body>
                            <table>
                                <tr>
                                    <th>Ev</th>
                                    <th>Het</th>
                                    <th>Darab</th>
                                    <th>Szam</th>
                                    <th>Neremeny</th>
                                </tr>';

        foreach($result as $row) 
        {
            $html.='<tr>';
            $html.='<td>';
            $html.=$row['ev'];
            $html.='</td>';
            $html.='<td>';
            $html.=$row['het'];
            $html.='</td>';
            $html.='<td>';
            $html.=$row['darab'];
            $html.='</td>';
            $html.='<td>';
            $html.=$row['szam'];
            $html.='</td>';
            $html.='<td>';
            $html.=$row['ertek'];
            $html.='</td>';
            $html.='</tr>';
        }
        $html.='        </table>
                    </body>
                </html>';
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Web-programozás II');
        $pdf->SetTitle('TALALAT');
        $pdf->SetSubject('Web-programozás II Beadando - TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, Web-programozás II, Beadando');
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Output('Hatoslotto', 'I');
    }
?>