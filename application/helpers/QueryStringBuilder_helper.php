<?php
function qsb_buildFieldsList(array $fieldsArr)
{
	return sizeof($fieldsArr) ? sprintf('`%s`', implode('`, `', $fieldsArr)) : '*';
}

function qsb_buildKeyStringForInsertQuery(array $keyValuePairs) {
	return sprintf('(`%s`)', implode('`, `', array_keys($keyValuePairs)));
}

function qsb_buildValueStringForInsertQuery(array $keyValuePairs) {
	return sprintf('(\'%s\')', implode('\', \'', array_values($keyValuePairs)));
}
