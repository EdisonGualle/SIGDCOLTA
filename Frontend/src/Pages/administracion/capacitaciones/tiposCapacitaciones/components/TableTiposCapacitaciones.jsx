/*import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS, LANGUAGE_OPTIONS } from "../../../empleados/components/traduccionTableGrid.ts"


const TiposTiposCapacitaciones = ({ TiposCapacitaciones, onCreateDireccion }) => {
    const [rowData, setRowData] = useState([]);

    // Column Definitions
    const [colDefs] = useState([
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
      setRowData(TiposCapacitaciones);
    }, [TiposCapacitaciones]);
  
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
          chartContainer: document.querySelector("#myChart"), // Identificador del contenedor del gráfico
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

export default TiposTiposCapacitaciones;*/
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS, LANGUAGE_OPTIONS } from "../../../empleados/components/traduccionTableGrid.ts"


const TiposTiposCapacitaciones = ({ TiposCapacitaciones, onCreateDireccion }) => {
    const [rowData, setRowData] = useState([]);

    // Column Definitions
    const [colDefs] = useState([
        { headerName: "Capacitación", field: "nombre",
          checkboxSelection: true,
          headerCheckboxSelection: true,
          suppressMenu: true,
        },
        
        { headerName: "Descripción", field: "descripcion" },
        { headerName: "Tipo de Evento", field: "tipoEvento" },
        { headerName: "Institución", field: "institucion" },
        { headerName: "Cantidad de Horas", field: "cantidadHoras" },
        { headerName: "Fecha", field: "fecha", 
          filter: "agDateColumnFilter",
          suppressMenu: true,
        },
      // Agrega más columnas según sea necesario
    ]);
  
    // Fetch data & update rowData state
    useEffect(() => {
      setRowData(TiposCapacitaciones);
    }, [TiposCapacitaciones]);
  
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
          chartContainer: document.querySelector("#myChart"), // Identificador del contenedor del gráfico
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

export default TiposTiposCapacitaciones;
