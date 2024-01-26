import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableCapacitaciones = ({ capacitaciones }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    { headerName: "Cedula", field: "cedula" },
    {
      headerName: "Nombre Completo",
      valueGetter: (params) =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    { headerName: "Capacitación", field: "nombre" },
    { headerName: "Descripción", field: "descripcion" },
    { headerName: "Tipo de Evento", field: "tipoEvento" },
    { headerName: "Institución", field: "institucion" },
    { headerName: "Cantidad de Horas", field: "cantidadHoras" },
    { headerName: "Fecha", field: "fecha" },
    // Agrega más columnas según sea necesario
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(capacitaciones);
  }, [capacitaciones]);

  // Apply settings across all columns
  const defaultColDef = useMemo(
    () => ({
      filter: "agTextColumnFilter",
      filterParams: {
        filterOptions: ["contains"],
        defaultFilterOption: "contains",
        suppressAndOrCondition: true,
      },
      floatingFilter: true,
    }),
    []
  );

  const onFirstDataRendered = useCallback(
    (params) => {
      params.api.createRangeChart({
        chartContainer: document.querySelector("#myChart"),
        cellRange: {
          rowStartIndex: 0,
          rowEndIndex: rowData.length - 1,
          columns: ["nombre", "descripcion"], // Ajusta las columnas según tus datos
        },
        chartType: "groupedColumn",
        aggFunc: "sum",
      });
    },
    [rowData]
  );

  return (
    <div className="h-full">
      <div
        className={"ag-theme-quartz"}
        style={{ width: "100%", height: "90%" }}
      >
        <AgGridReact
          localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
          rowData={rowData}
          columnDefs={colDefs}
          defaultColDef={defaultColDef}
          pagination={true}
          onFirstDataRendered={onFirstDataRendered}
        />
      </div>
      <div id="myChart" className="ag-theme-quartz my-chart"></div>
    </div>
  );
};

export default TableCapacitaciones;
