<?php

namespace Kendo\Dataviz\UI;

class StockChartNavigatorCategoryAxisCrosshairTooltip extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The background color of the tooltip. Accepts a valid CSS color string, including hex and rgb.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function background($value) {
        return $this->setProperty('background', $value);
    }

    /**
    * The border options.
    * @param \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltipBorder|array $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function border($value) {
        return $this->setProperty('border', $value);
    }

    /**
    * The text color of the tooltip. Accepts a valid CSS color string, including hex and rgb.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function color($value) {
        return $this->setProperty('color', $value);
    }

    /**
    * The tooltip font.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function font($value) {
        return $this->setProperty('font', $value);
    }

    /**
    * The format used to display the tooltip. Uses kendo.format. Contains one placeholder ("{0}") which represents the category value.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function format($value) {
        return $this->setProperty('format', $value);
    }

    /**
    * The padding of the crosshair tooltip. A numeric value will set all paddings.
    * @param float|\Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltipPadding|array $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function padding($value) {
        return $this->setProperty('padding', $value);
    }

    /**
    * Sets the template option of the StockChartNavigatorCategoryAxisCrosshairTooltip.
    * The template which renders the tooltip.The fields which can be used in the template are: value - the category value.
    * @param string $value The id of the element which represents the kendo template.
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function templateId($value) {
        $value = new \Kendo\Template($value);

        return $this->setProperty('template', $value);
    }

    /**
    * Sets the template option of the StockChartNavigatorCategoryAxisCrosshairTooltip.
    * The template which renders the tooltip.The fields which can be used in the template are: value - the category value.
    * @param string $value The template content.
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function template($value) {
        return $this->setProperty('template', $value);
    }

    /**
    * If set to true the chart will display the category axis crosshair tooltip. By default the category axis crosshair tooltip is not visible.
    * @param boolean $value
    * @return \Kendo\Dataviz\UI\StockChartNavigatorCategoryAxisCrosshairTooltip
    */
    public function visible($value) {
        return $this->setProperty('visible', $value);
    }

//<< Properties
}

?>
