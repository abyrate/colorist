
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Abyrate" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Abyrate.html">Abyrate</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Abyrate_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Abyrate/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Abyrate_Exceptions_ColoristException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Abyrate/Exceptions/ColoristException.html">ColoristException</a>                    </div>                </li>                            <li data-name="class:Abyrate_Exceptions_HexException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Abyrate/Exceptions/HexException.html">HexException</a>                    </div>                </li>                            <li data-name="class:Abyrate_Exceptions_RgbException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Abyrate/Exceptions/RgbException.html">RgbException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Abyrate_Interfaces" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Abyrate/Interfaces.html">Interfaces</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Abyrate_Interfaces_ModelInterface" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Abyrate/Interfaces/ModelInterface.html">ModelInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Abyrate_Models" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Abyrate/Models.html">Models</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Abyrate_Models_HEX" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Abyrate/Models/HEX.html">HEX</a>                    </div>                </li>                            <li data-name="class:Abyrate_Models_RGB" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Abyrate/Models/RGB.html">RGB</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Abyrate_Colorist" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Abyrate/Colorist.html">Colorist</a>                    </div>                </li>                            <li data-name="class:Abyrate_Model" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Abyrate/Model.html">Model</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Abyrate.html", "name": "Abyrate", "doc": "Namespace Abyrate"},{"type": "Namespace", "link": "Abyrate/Exceptions.html", "name": "Abyrate\\Exceptions", "doc": "Namespace Abyrate\\Exceptions"},{"type": "Namespace", "link": "Abyrate/Interfaces.html", "name": "Abyrate\\Interfaces", "doc": "Namespace Abyrate\\Interfaces"},{"type": "Namespace", "link": "Abyrate/Models.html", "name": "Abyrate\\Models", "doc": "Namespace Abyrate\\Models"},
            {"type": "Interface", "fromName": "Abyrate\\Interfaces", "fromLink": "Abyrate/Interfaces.html", "link": "Abyrate/Interfaces/ModelInterface.html", "name": "Abyrate\\Interfaces\\ModelInterface", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_create", "name": "Abyrate\\Interfaces\\ModelInterface::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_getChannelsList", "name": "Abyrate\\Interfaces\\ModelInterface::getChannelsList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_getTypesList", "name": "Abyrate\\Interfaces\\ModelInterface::getTypesList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_syncAlpha", "name": "Abyrate\\Interfaces\\ModelInterface::syncAlpha", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_isType", "name": "Abyrate\\Interfaces\\ModelInterface::isType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_isChannel", "name": "Abyrate\\Interfaces\\ModelInterface::isChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_convertToRgb", "name": "Abyrate\\Interfaces\\ModelInterface::convertToRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_convertFromRgb", "name": "Abyrate\\Interfaces\\ModelInterface::convertFromRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_setChannel", "name": "Abyrate\\Interfaces\\ModelInterface::setChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_getChannel", "name": "Abyrate\\Interfaces\\ModelInterface::getChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_set", "name": "Abyrate\\Interfaces\\ModelInterface::set", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_get", "name": "Abyrate\\Interfaces\\ModelInterface::get", "doc": "&quot;&quot;"},
            
            
            {"type": "Class", "fromName": "Abyrate", "fromLink": "Abyrate.html", "link": "Abyrate/Colorist.html", "name": "Abyrate\\Colorist", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_create", "name": "Abyrate\\Colorist::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method___construct", "name": "Abyrate\\Colorist::__construct", "doc": "&quot;Colorist constructor.&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_setChannel", "name": "Abyrate\\Colorist::setChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_getChannel", "name": "Abyrate\\Colorist::getChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_set", "name": "Abyrate\\Colorist::set", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_get", "name": "Abyrate\\Colorist::get", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_loadModels", "name": "Abyrate\\Colorist::loadModels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_loadChannels", "name": "Abyrate\\Colorist::loadChannels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_loadTypes", "name": "Abyrate\\Colorist::loadTypes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_detectParser", "name": "Abyrate\\Colorist::detectParser", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_otherParser", "name": "Abyrate\\Colorist::otherParser", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_hexParser", "name": "Abyrate\\Colorist::hexParser", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_nameParser", "name": "Abyrate\\Colorist::nameParser", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_getModel", "name": "Abyrate\\Colorist::getModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Colorist", "fromLink": "Abyrate/Colorist.html", "link": "Abyrate/Colorist.html#method_syncModels", "name": "Abyrate\\Colorist::syncModels", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate\\Exceptions", "fromLink": "Abyrate/Exceptions.html", "link": "Abyrate/Exceptions/ColoristException.html", "name": "Abyrate\\Exceptions\\ColoristException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Exceptions\\ColoristException", "fromLink": "Abyrate/Exceptions/ColoristException.html", "link": "Abyrate/Exceptions/ColoristException.html#method_UndefinedValue", "name": "Abyrate\\Exceptions\\ColoristException::UndefinedValue", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\ColoristException", "fromLink": "Abyrate/Exceptions/ColoristException.html", "link": "Abyrate/Exceptions/ColoristException.html#method_typeModelIsUndefined", "name": "Abyrate\\Exceptions\\ColoristException::typeModelIsUndefined", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\ColoristException", "fromLink": "Abyrate/Exceptions/ColoristException.html", "link": "Abyrate/Exceptions/ColoristException.html#method_channelIsUndefined", "name": "Abyrate\\Exceptions\\ColoristException::channelIsUndefined", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\ColoristException", "fromLink": "Abyrate/Exceptions/ColoristException.html", "link": "Abyrate/Exceptions/ColoristException.html#method_modelIsUndefined", "name": "Abyrate\\Exceptions\\ColoristException::modelIsUndefined", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\ColoristException", "fromLink": "Abyrate/Exceptions/ColoristException.html", "link": "Abyrate/Exceptions/ColoristException.html#method_modelNotFound", "name": "Abyrate\\Exceptions\\ColoristException::modelNotFound", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate\\Exceptions", "fromLink": "Abyrate/Exceptions.html", "link": "Abyrate/Exceptions/HexException.html", "name": "Abyrate\\Exceptions\\HexException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Exceptions\\HexException", "fromLink": "Abyrate/Exceptions/HexException.html", "link": "Abyrate/Exceptions/HexException.html#method_notArray", "name": "Abyrate\\Exceptions\\HexException::notArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\HexException", "fromLink": "Abyrate/Exceptions/HexException.html", "link": "Abyrate/Exceptions/HexException.html#method_channelIsNotExist", "name": "Abyrate\\Exceptions\\HexException::channelIsNotExist", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\HexException", "fromLink": "Abyrate/Exceptions/HexException.html", "link": "Abyrate/Exceptions/HexException.html#method_invalidValue", "name": "Abyrate\\Exceptions\\HexException::invalidValue", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate\\Exceptions", "fromLink": "Abyrate/Exceptions.html", "link": "Abyrate/Exceptions/RgbException.html", "name": "Abyrate\\Exceptions\\RgbException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Exceptions\\RgbException", "fromLink": "Abyrate/Exceptions/RgbException.html", "link": "Abyrate/Exceptions/RgbException.html#method_notArray", "name": "Abyrate\\Exceptions\\RgbException::notArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Exceptions\\RgbException", "fromLink": "Abyrate/Exceptions/RgbException.html", "link": "Abyrate/Exceptions/RgbException.html#method_channelIsNotExist", "name": "Abyrate\\Exceptions\\RgbException::channelIsNotExist", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate\\Interfaces", "fromLink": "Abyrate/Interfaces.html", "link": "Abyrate/Interfaces/ModelInterface.html", "name": "Abyrate\\Interfaces\\ModelInterface", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_create", "name": "Abyrate\\Interfaces\\ModelInterface::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_getChannelsList", "name": "Abyrate\\Interfaces\\ModelInterface::getChannelsList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_getTypesList", "name": "Abyrate\\Interfaces\\ModelInterface::getTypesList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_syncAlpha", "name": "Abyrate\\Interfaces\\ModelInterface::syncAlpha", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_isType", "name": "Abyrate\\Interfaces\\ModelInterface::isType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_isChannel", "name": "Abyrate\\Interfaces\\ModelInterface::isChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_convertToRgb", "name": "Abyrate\\Interfaces\\ModelInterface::convertToRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_convertFromRgb", "name": "Abyrate\\Interfaces\\ModelInterface::convertFromRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_setChannel", "name": "Abyrate\\Interfaces\\ModelInterface::setChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_getChannel", "name": "Abyrate\\Interfaces\\ModelInterface::getChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_set", "name": "Abyrate\\Interfaces\\ModelInterface::set", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Interfaces\\ModelInterface", "fromLink": "Abyrate/Interfaces/ModelInterface.html", "link": "Abyrate/Interfaces/ModelInterface.html#method_get", "name": "Abyrate\\Interfaces\\ModelInterface::get", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate", "fromLink": "Abyrate.html", "link": "Abyrate/Model.html", "name": "Abyrate\\Model", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Model", "fromLink": "Abyrate/Model.html", "link": "Abyrate/Model.html#method_getChannelsList", "name": "Abyrate\\Model::getChannelsList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Model", "fromLink": "Abyrate/Model.html", "link": "Abyrate/Model.html#method_getTypesList", "name": "Abyrate\\Model::getTypesList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Model", "fromLink": "Abyrate/Model.html", "link": "Abyrate/Model.html#method_syncAlpha", "name": "Abyrate\\Model::syncAlpha", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Model", "fromLink": "Abyrate/Model.html", "link": "Abyrate/Model.html#method_isType", "name": "Abyrate\\Model::isType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Model", "fromLink": "Abyrate/Model.html", "link": "Abyrate/Model.html#method_isChannel", "name": "Abyrate\\Model::isChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Model", "fromLink": "Abyrate/Model.html", "link": "Abyrate/Model.html#method_limitation", "name": "Abyrate\\Model::limitation", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate\\Models", "fromLink": "Abyrate/Models.html", "link": "Abyrate/Models/HEX.html", "name": "Abyrate\\Models\\HEX", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method___construct", "name": "Abyrate\\Models\\HEX::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_create", "name": "Abyrate\\Models\\HEX::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_syncAlpha", "name": "Abyrate\\Models\\HEX::syncAlpha", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_convertToRgb", "name": "Abyrate\\Models\\HEX::convertToRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_convertFromRgb", "name": "Abyrate\\Models\\HEX::convertFromRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_setChannel", "name": "Abyrate\\Models\\HEX::setChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_getChannel", "name": "Abyrate\\Models\\HEX::getChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_set", "name": "Abyrate\\Models\\HEX::set", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_get", "name": "Abyrate\\Models\\HEX::get", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_parseValue", "name": "Abyrate\\Models\\HEX::parseValue", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_strToDec", "name": "Abyrate\\Models\\HEX::strToDec", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_decToHex", "name": "Abyrate\\Models\\HEX::decToHex", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\HEX", "fromLink": "Abyrate/Models/HEX.html", "link": "Abyrate/Models/HEX.html#method_explodeHex", "name": "Abyrate\\Models\\HEX::explodeHex", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Abyrate\\Models", "fromLink": "Abyrate/Models.html", "link": "Abyrate/Models/RGB.html", "name": "Abyrate\\Models\\RGB", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method___construct", "name": "Abyrate\\Models\\RGB::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_create", "name": "Abyrate\\Models\\RGB::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_convertToRgb", "name": "Abyrate\\Models\\RGB::convertToRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_convertFromRgb", "name": "Abyrate\\Models\\RGB::convertFromRgb", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_setChannel", "name": "Abyrate\\Models\\RGB::setChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_getChannel", "name": "Abyrate\\Models\\RGB::getChannel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_set", "name": "Abyrate\\Models\\RGB::set", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_get", "name": "Abyrate\\Models\\RGB::get", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Abyrate\\Models\\RGB", "fromLink": "Abyrate/Models/RGB.html", "link": "Abyrate/Models/RGB.html#method_parseValue", "name": "Abyrate\\Models\\RGB::parseValue", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


