import React, { useEffect, useMemo, useState, useCallback } from "react";
import { AgGridReact } from "ag-grid-react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";
const TableContratos = ({ contratos }) => {
    const [rowData, setRowData] = useState([]);
  
    // Column Definitions
    const [colDefs] = useState([
      { headerName: "Nombre", field: "nombreCompleto" },
      { headerName: "Fecha de Inicio", field: "fechaInicio" },
      { headerName: "Fecha de Fin", field: "fechaFin" },
      { headerName: "Tipo de Contrato", field: "tipoContratoNombre" },
      { headerName: "Archivo", field: "archivo" },
      { headerName: "Salario", field: "salario" },
      { headerName: "Estado de Contrato", field: "estadoContrato" },
    ]);
  
    // Fetch data & update rowData state
    useEffect(() => {
      // Transformar datos si es necesario
      const transformedContratos = contratos ? contratos.map((contrato) => ({
        ...contrato,
        nombreCompleto: `${contrato.primerNombre} ${contrato.segundoNombre} ${contrato.primerApellido} ${contrato.segundoApellido}`,
      })) : [];
      
      
      setRowData(transformedContratos);
    }, [contratos]);
  
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
            columns: ["cedula", "edad"],
          },
          chartType: "groupedColumn",
          aggFunc: "sum",
        });
      },
      [rowData]
    );
  
    return (
      <div className="h-full">
        <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
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
  
  export default TableContratos;