const DAY_OPTION: { weekday: string } = { weekday: "long" };

const DATE_OPTION: { year: string; month: string; day: string } = {
  year: "numeric",
  month: "long",
  day: "numeric"
};

const LANGUAGE_OPTIONS: Record<string, string> = {
  EN: "en-GB",
  ES: "es-ES",
  DE: "de-DE"
};

type TranslationsType = Record<string, Record<string, string>>;

const TRANSLATIONS: TranslationsType = {
 
  "es-ES": {
    DAY: "día",
    DATE: "fecha",
    MEALTIME: "hora de comer",
    FOOD: "¿que se comió?",
    PRICE: "precio",
    BREAKFAST: "Desayuno",
    LUNCH: "Almuerzo",
    DINNER: "Cena",
    PORRIDGE: "gachas de avena",
    OMLETTE: "tortilla frita",
    SANDWICH: "sándwich",
    SOUP: "sopa",
    PROTEINSHAKE: "batido de proteínas",
    CHOCOLATEBAR: "barra de chocolate",
    SAUSAGES: "salchichas",
    STEAK: "bistec",
    LAMBCHOPS: "chuletas de cordero",
    // Start of ag-Grid locale translations
    selectAll: "(seleccionar todo)",
    searchOoo: "buscar...",
    blanks: "(espacios en blanco)",
    noMatches: "no hay coincidencias",

    // Number Filter & Text Filter
    filterOoo: "filtrar...",
    equals: "igual",
    notEqual: "no es igual",
    empty: "elige uno",

    // Number Filter
    lessThan: "menos que",
    greaterThan: "mas grande que",

    // Text Filter
    contains: "contiene",

    // Date Filter
    dateFormatOoo: "yyyy-mm-dd",

    // Filter Buttons
    applyFilter: "aplicar",
    resetFilter: "Reiniciar",

    // Filter Titles
    textFilter: "filtro de texto",
    numberFilter: "filtro de número",
    dateFilter: "filtro de fecha",
    setFilter: "filtro de valores",

    // Side Bar
    columns: "columnas",
    filters: "filtros",

    // Other
    loadingOoo: "cargando...",
    noRowsToShow: "no hay filas para mostrar",
    enabled: "habilitado",

    // Menu
    pinColumn: "alfiler columna",
    pinLeft: "pin a la izquierda",
    pinRight: "pin a la derecha",
    noPin: "no Pin",

    autosizeThiscolumn: "tamaño automático de esta columna",
    autosizeAllColumns: "tamaño automático de todas las columnas",
    resetColumns: "restablecer columnas",
    copy: "Copiar",
    ctrlC: "Ctrl+C",
    copyWithHeaders: "copiar con encabezados",
    paste: "pegar",
    ctrlV: "Ctrl+V",
    export: "exportar",
    csvExport: "CSV exportar",
    excelExport: "Excel exportar (.xlsx)",
    excelXmlExport: "Excel exportar (.xml)",
    page:'Pagina',
    of:'de',
    to:'a',
    pageSize:'Cantidad',
    and:'Y',
    or: 'O'
    
  },

};

export { DATE_OPTION, DAY_OPTION, TRANSLATIONS, LANGUAGE_OPTIONS };
