<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelController extends BaseController
{
    protected $sheetColumnMap = [];

    /**
     * Creates a new Spreadsheet instance.
     *
     * @return Spreadsheet
     */
    public function createSpreadsheet(): Spreadsheet
    {
        return new Spreadsheet();
    }

    /**
     * Adds a new sheet to the given spreadsheet.
     *
     * @param Spreadsheet $spreadsheet
     * @param string $title The title of the new sheet.
     * @return Worksheet The created worksheet.
     * 
     * Example usage:
     * $excelManager = new ExcelManager();
     * $spreadsheet = $excelManager->createSpreadsheet();
     * $sheet = $excelManager->addSheet($spreadsheet, 'Sales Data');
     */
    public function addSheet(Spreadsheet $spreadsheet, string $title): Worksheet
    {
        $sheetIndex = $spreadsheet->getSheetCount();
        $spreadsheet->createSheet($sheetIndex);
        $sheet = $spreadsheet->setActiveSheetIndex($sheetIndex);
        $sheet->setTitle($title);
        return $sheet;
    }

    /**
     * Sets the active sheet by its index.
     *
     * @param Spreadsheet $spreadsheet
     * @param int $index The index of the sheet to set active.
     * @return Worksheet The active worksheet.
     * 
     * Example usage:
     * $excelManager->setActiveSheet($spreadsheet, 0);
     */
    public function setActiveSheet(Spreadsheet $spreadsheet, int $index): Worksheet
    {
        if ($index < 0 || $index >= $spreadsheet->getSheetCount()) {
            throw new \InvalidArgumentException('Invalid sheet index');
        }
        return $spreadsheet->setActiveSheetIndex($index);
    }

    /**
     * Gets the index of the specified sheet.
     *
     * @param Spreadsheet $spreadsheet
     * @param Worksheet $sheet
     * @return int The index of the sheet.
     * 
     * Example usage:
     * $index = $excelManager->getSheetIndex($spreadsheet, $sheet);
     */
    public function getSheetIndex(Spreadsheet $spreadsheet, Worksheet $sheet): int
    {
        return $spreadsheet->getIndex($sheet);
    }

    /**
     * Adds headings to the specified row in the sheet.
     *
     * @param Spreadsheet $spreadsheet
     * @param Worksheet $sheet
     * @param int $row The row number to add headings to.
     * @param array $headings An array of heading titles.
     * 
     * Example usage:
     * $excelManager->addHeadings($spreadsheet, $sheet, 1, ['Product', 'Price', 'Quantity']);
     */
    public function addHeadings(Spreadsheet $spreadsheet, Worksheet $sheet, int $row, array $headings): void
    {
        $column = 'A';
        $sheetIndex = $this->getSheetIndex($spreadsheet, $sheet);
        foreach ($headings as $heading) {
            $sheet->setCellValue("{$column}{$row}", $heading);
            $this->sheetColumnMap[$sheetIndex][$heading] = $column;
            $column++;
        }
    }

    /**
     * Adds rows of data starting from the specified row.
     *
     * @param Worksheet $sheet
     * @param int $startRow The starting row number.
     * @param array $data A multidimensional array of row data.
     * 
     * Example usage:
     * $data = [
     *     ['Apple', 1.00, 50],
     *     ['Banana', 0.50, 100]
     * ];
     * $excelManager->addRows($sheet, 2, $data);
     */
    public function addRows(Worksheet $sheet, int $startRow, array $data): void
    {
        foreach ($data as $row) {
            $column = 'A';
            foreach ($row as $cellValue) {
                $sheet->setCellValue("{$column}{$startRow}", $cellValue);
                $column++;
            }
            $startRow++;
        }
    }

    /**
     * Retrieves the column letter associated with a given heading.
     *
     * @param Worksheet $sheet
     * @param string $heading The heading to find.
     * @param int $row The row number to search in.
     * @return string|null The column letter or null if not found.
     * 
     * Example usage:
     * $columnLetter = $excelManager->getColumnLetterByHeading($sheet, 'Price');
     */
    public function getColumnLetterByHeading(Worksheet $sheet, string $heading, int $row = 1): ?string
    {
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        for ($i = 1; $i <= $highestColumnIndex; $i++) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i);
            if ($sheet->getCell("{$columnLetter}{$row}")->getValue() === $heading) {
                return $columnLetter;
            }
        }
        return null;
    }

    /**
     * Gets the title of the specified sheet.
     *
     * @param Worksheet $sheet
     * @return string The title of the sheet.
     * 
     * Example usage:
     * $title = $excelManager->getSheetTitle($sheet);
     */
    public function getSheetTitle(Worksheet $sheet): string
    {
        return $sheet->getTitle();
    }

    /**
     * Hides the specified sheet in the spreadsheet.
     *
     * @param Spreadsheet $spreadsheet
     * @param string $title The title of the sheet to hide.
     * 
     * Example usage:
     * $excelManager->hideSheet($spreadsheet, 'Sales Data');
     */
    public function hideSheet(Spreadsheet $spreadsheet, string $title): void
    {
        $sheet = $spreadsheet->getSheetByName($title);
        if ($sheet) {
            $sheet->setSheetState(Worksheet::SHEETSTATE_HIDDEN);
        }
    }

    /**
     * Protects the specified sheet with a password.
     *
     * @param Worksheet $sheet
     * @param string $password The password to protect the sheet.
     * 
     * Example usage:
     * $excelManager->protectSheet($sheet, 'securePassword');
     */
    public function protectSheet(Worksheet $sheet, string $password): void
    {
        $sheet->getProtection()->setSheet(true);
        $sheet->getProtection()->setPassword($password);
    }

    /**
     * Hides a specified column in the sheet.
     *
     * @param Worksheet $sheet
     * @param string $columnLetter The letter of the column to hide.
     * 
     * Example usage:
     * $excelManager->hideColumn($sheet, 'C'); // Hides the third column
     */
    public function hideColumn(Worksheet $sheet, string $columnLetter): void
    {
        $sheet->getColumnDimension($columnLetter)->setVisible(false);
    }



    /**
     * Adds dropdown validation to a specified cell range.
     *
     * @param Worksheet $sheet
     * @param string $cellRange The range of cells to apply validation to.
     * @param string $formula The formula for dropdown items.
     * @param string|null $promptTitle Optional prompt title.
     * @param string|null $promptMessage Optional prompt message.
     * 
     * Example usage:
     * $excelManager->addDropdownValidation($sheet, 'D1', 'Item1,Item2,Item3', 'Select an Item', 'Choose from the dropdown list.');
     */
    public function addDropdownValidation(
        Worksheet $sheet,
        string $cellRange,
        string $formula,
        ?string $promptTitle = null,
        ?string $promptMessage = null
    ): void {
        $validation = new DataValidation();
        $validation->setType(DataValidation::TYPE_LIST);
        $validation->setErrorStyle(DataValidation::STYLE_STOP);
        $validation->setAllowBlank(false);
        $validation->setShowDropDown(true);
        $validation->setFormula1($formula);

        if ($promptTitle !== null) {
            $validation->setShowInputMessage(true);
            $validation->setPromptTitle($promptTitle);
        }

        if ($promptMessage !== null) {
            $validation->setPrompt($promptMessage);
        }

        $sheet->getCell($cellRange)->setDataValidation($validation);
    }

    // New Common Functions

    /**
     * Sets the style for a specified cell range.
     *
     * @param Worksheet $sheet
     * @param string $cellRange The range of cells to style.
     * @param array $styleArray An associative array of style attributes.
     * 
     * Example usage:
     * $styleArray = [
     *     'font' => ['bold' => true],
     *     'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['argb' => 'FFFF00']],
     * ];
     * $excelManager->setCellStyle($sheet, 'A1:C1', $styleArray);
     */
    public function setCellStyle(Worksheet $sheet, string $cellRange, array $styleArray): void
    {
        $sheet->getStyle($cellRange)->applyFromArray($styleArray);
    }

    /**
     * Merges cells in a specified range.
     *
     * @param Worksheet $sheet
     * @param string $cellRange The range of cells to merge.
     * 
     * Example usage:
     * $excelManager->mergeCells($sheet, 'A1:C1'); // Merges the first row across columns A to C
     */
    public function mergeCells(Worksheet $sheet, string $cellRange): void
    {
        $sheet->mergeCells($cellRange);
    }

    /**
     * Adds a formula to a specified cell.
     *
     * @param Worksheet $sheet
     * @param string $cell The cell to which the formula will be added.
     * @param string $formula The formula to add (e.g., '=SUM(A1:A10)').
     * 
     * Example usage:
     * $excelManager->addFormula($sheet, 'D1', '=SUM(B1:B10)'); // Adds a SUM formula to cell D1
     */
    public function addFormula(Worksheet $sheet, string $cell, string $formula): void
    {
        $sheet->setCellValue($cell, $formula);
    }

    /**
     * Sets the width of a specified column.
     *
     * @param Worksheet $sheet
     * @param string $columnLetter The letter of the column to set width.
     * @param float $width The width to set.
     * 
     * Example usage:
     * $excelManager->setColumnWidth($sheet, 'B', 20); // Sets the width of column B to 20
     */
    public function setColumnWidth(Worksheet $sheet, string $columnLetter, float $width): void
    {
        $sheet->getColumnDimension($columnLetter)->setWidth($width);
    }

    /**
     * Adds a hyperlink to a specified cell.
     *
     * @param Worksheet $sheet
     * @param string $cell The cell where the hyperlink will be added.
     * @param string $url The URL for the hyperlink.
     * @param string|null $tooltip Optional tooltip for the hyperlink.
     * 
     * Example usage:
     * $excelManager->addHyperlink($sheet, 'E1', 'https://example.com', 'Visit Example'); // Adds a hyperlink to cell E1
     */
    public function addHyperlink(Worksheet $sheet, string $cell, string $url, ?string $tooltip = null): void
    {
        $sheet->getCell($cell)->setHyperlink(new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink($url, $tooltip));
    }

    /**
     * Adds an image to the specified worksheet.
     *
     * @param Worksheet $sheet
     * @param string $imagePath Path to the image file.
     * @param string $cell Cell coordinate to position the image.
     * 
     * Example usage:
     * $excelManager->addImageToSheet($sheet, '/path/to/image.png', 'B2');
     */
    public function addImageToSheet(Worksheet $sheet, string $imagePath, string $cell): void
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setPath($imagePath);
        $drawing->setCoordinates($cell);
        $drawing->setWorksheet($sheet);
    }

    /**
     * Sets the height of a specified row.
     *
     * @param Worksheet $sheet
     * @param int $row Row number to set height.
     * @param float $height The height to set.
     * 
     * Example usage:
     * $excelManager->setRowHeight($sheet, 1, 25); // Sets the height of the first row to 25
     */
    public function setRowHeight(Worksheet $sheet, int $row, float $height): void
    {
        $sheet->getRowDimension($row)->setRowHeight($height);
    }
    /**
     * Adds conditional formatting to a specified range.
     *
     * @param Worksheet $sheet
     * @param string $cellRange The range of cells to format.
     * @param string $conditionType The type of condition (e.g., 'cellIs', 'notContains').
     * @param string $value The value to compare against.
     * @param array $styleArray The style to apply when condition is met.
     * 
     * Example usage:
     * $styleArray = ['fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'color' => ['argb' => 'FFFF00']]];
     * $excelManager->addConditionalFormatting($sheet, 'A1:A10', 'cellIs', '10', $styleArray);
     */
    public function addConditionalFormatting(Worksheet $sheet, string $cellRange, string $conditionType, string $value, array $styleArray): void
    {
        $conditionalStyles = $sheet->getStyle($cellRange)->getConditionalStyles();
        $conditional = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
        $conditional->setConditionType($conditionType);
        $conditional->addCondition($value);
        $conditional->setStyle(new \PhpOffice\PhpSpreadsheet\Style\Style());
        $conditional->getStyle()->applyFromArray($styleArray);
        $conditionalStyles[] = $conditional;
        $sheet->getStyle($cellRange)->setConditionalStyles($conditionalStyles);
    }

    /**
     * Freezes panes in the specified worksheet.
     *
     * @param Worksheet $sheet
     * @param string $cell The cell coordinate to freeze panes at (e.g., 'B2').
     * 
     * Example usage:
     * $excelManager->freezePanes($sheet, 'A2'); // Freezes the first row
     */
    public function freezePanes(Worksheet $sheet, string $cell): void
    {
        $sheet->freezePane($cell);
    }
    /**
     * Adds an auto filter to the specified range.
     *
     * @param Worksheet $sheet
     * @param string $cellRange The range of cells to apply the filter.
     * 
     * Example usage:
     * $excelManager->setAutoFilter($sheet, 'A1:C1'); // Applies autofilter to the first row
     */
    public function setAutoFilter(Worksheet $sheet, string $cellRange): void
    {
        $sheet->setAutoFilter($cellRange);
    }

    public function autoSizeAllColumns(Worksheet $sheet): void
    {
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        for ($i = 1; $i <= $highestColumnIndex; $i++) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i);
            $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
        }
    }
    /**
     * Adds a SUM formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D1').
     * @param string $range The range to sum (e.g., 'A1:A10').
     *
     * Example usage:
     * $this->addSumFormula($sheet, 'D1', 'A1:A10'); // D1 will show the sum of A1 to A10.
     */
    public function addSumFormula(Worksheet $sheet, string $cell, string $range): void
    {
        $this->addFormula($sheet, $cell, "=SUM($range)");
    }

    /**
     * Adds an AVERAGE formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D2').
     * @param string $range The range to average (e.g., 'B1:B10').
     *
     * Example usage:
     * $this->addAverageFormula($sheet, 'D2', 'B1:B10'); // D2 will show the average of B1 to B10.
     */
    public function addAverageFormula(Worksheet $sheet, string $cell, string $range): void
    {
        $this->addFormula($sheet, $cell, "=AVERAGE($range)");
    }

    /**
     * Adds a COUNT formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D3').
     * @param string $range The range to count (e.g., 'C1:C10').
     *
     * Example usage:
     * $this->addCountFormula($sheet, 'D3', 'C1:C10'); // D3 will show the count of non-empty cells in C1 to C10.
     */
    public function addCountFormula(Worksheet $sheet, string $cell, string $range): void
    {
        $this->addFormula($sheet, $cell, "=COUNT($range)");
    }

    /**
     * Adds a MAX formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D4').
     * @param string $range The range to find the maximum (e.g., 'D1:D10').
     *
     * Example usage:
     * $this->addMaxFormula($sheet, 'D4', 'D1:D10'); // D4 will show the maximum value from D1 to D10.
     */
    public function addMaxFormula(Worksheet $sheet, string $cell, string $range): void
    {
        $this->addFormula($sheet, $cell, "=MAX($range)");
    }

    /**
     * Adds a MIN formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D5').
     * @param string $range The range to find the minimum (e.g., 'E1:E10').
     *
     * Example usage:
     * $this->addMinFormula($sheet, 'D5', 'E1:E10'); // D5 will show the minimum value from E1 to E10.
     */
    public function addMinFormula(Worksheet $sheet, string $cell, string $range): void
    {
        $this->addFormula($sheet, $cell, "=MIN($range)");
    }

    /**
     * Adds an IF formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D6').
     * @param string $condition The condition to evaluate (e.g., 'A1>100').
     * @param string $trueValue The value to return if the condition is true (e.g., 'Over 100').
     * @param string $falseValue The value to return if the condition is false (e.g., 'Under 100').
     *
     * Example usage:
     * $this->addIfFormula($sheet, 'D6', 'A1>100', 'Over 100', 'Under 100'); // D6 shows 'Over 100' if A1 > 100.
     */
    public function addIfFormula(Worksheet $sheet, string $cell, string $condition, string $trueValue, string $falseValue): void
    {
        $this->addFormula($sheet, $cell, "=IF($condition, \"$trueValue\", \"$falseValue\")");
    }

    /**
     * Adds a VLOOKUP formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D7').
     * @param string $lookupValue The value to look up (e.g., 'A1').
     * @param string $tableArray The range of the table (e.g., 'F1:H10').
     * @param int $colIndex The column index of the value to return (e.g., 2).
     * @param bool $rangeLookup Optional. TRUE for approximate match, FALSE for exact match. Default is FALSE.
     *
     * Example usage:
     * $this->addVlookupFormula($sheet, 'D7', 'A1', 'F1:H10', 2); // D7 shows the value from the second column of the row where A1 matches.
     */
    public function addVlookupFormula(Worksheet $sheet, string $cell, string $lookupValue, string $tableArray, int $colIndex, bool $rangeLookup = false): void
    {
        $this->addFormula($sheet, $cell, "=VLOOKUP($lookupValue, $tableArray, $colIndex, " . ($rangeLookup ? "TRUE" : "FALSE") . ")");
    }

    /**
     * Adds a CONCATENATE formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D8').
     * @param array $textValues An array of text values to concatenate (e.g., ['Hello', 'World']).
     *
     * Example usage:
     * $this->addConcatenateFormula($sheet, 'D8', ['Hello', 'World']); // D8 will show 'Hello, World'.
     */
    public function addConcatenateFormula(Worksheet $sheet, string $cell, array $textValues): void
    {
        $joinedText = implode(", ", array_map(fn($val) => "\"$val\"", $textValues));
        $this->addFormula($sheet, $cell, "=CONCATENATE($joinedText)");
    }

    /**
     * Adds a TODAY formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D9').
     *
     * Example usage:
     * $this->addTodayFormula($sheet, 'D9'); // D9 will show the current date.
     */
    public function addTodayFormula(Worksheet $sheet, string $cell): void
    {
        $this->addFormula($sheet, $cell, '=TODAY()');
    }

    /**
     * Adds a NOW formula to a specified cell.
     *
     * @param Worksheet $sheet The worksheet to add the formula to.
     * @param string $cell The cell where the formula will be placed (e.g., 'D10').
     *
     * Example usage:
     * $this->addNowFormula($sheet, 'D10'); // D10 will show the current date and time.
     */
    public function addNowFormula(Worksheet $sheet, string $cell): void
    {
        $this->addFormula($sheet, $cell, '=NOW()');
    }

    /**
     * Saves and exports the spreadsheet to the specified file path.
     *
     * @param Spreadsheet $spreadsheet
     * @param string $filePath The file path to save the spreadsheet.
     * @param string $fileName The name of the file for download.
     * @return \CodeIgniter\Http\Response The response for file download.
     * 
     * Example usage:
     * $excelManager->saveAndExport($spreadsheet, '/path/to/file.xlsx', 'file.xlsx');
     */
    public function saveAndExport(Response $response, Spreadsheet $spreadsheet, string $filePath, string $fileName): \CodeIgniter\Http\Response
    {
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        if (!is_dir(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }
        $writer->save($filePath);
        return $response->download($filePath, null)->setFileName($fileName);
    }

    /**
     * Export the spreadsheet as a CSV file and trigger the file download.
     *
     * @param Spreadsheet $spreadsheet The PhpSpreadsheet object containing data.
     * @param string $filePath The full file path where the CSV file will be saved temporarily.
     * @return \CodeIgniter\Http\Response The response object triggering a download.
     */
    public function exportAsCsv(Spreadsheet $spreadsheet, string $filePath): \CodeIgniter\Http\Response
    {
        // Initialize the CSV writer with the provided spreadsheet
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);

        // Save the spreadsheet data as a CSV file at the specified path
        $writer->save($filePath);

        // Trigger the download of the generated CSV file using CodeIgniter's response object
        return $this->response->download($filePath, null);
    }
}
