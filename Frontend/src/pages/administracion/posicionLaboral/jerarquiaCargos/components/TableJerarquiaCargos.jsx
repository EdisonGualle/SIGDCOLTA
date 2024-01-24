import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS, LANGUAGE_OPTIONS } from "../../../empleados/components/traduccionTableGrid.ts";

const TableJerarquiaCargos = ({ jerarquiaCargos }) => {
    const [rowData, setRowData] = useState([]);

    // Column Definitions
    const [colDefs] = useState([
        { headerName: "Cargo", field: "nombreCargo", editable: true },
        { headerName: "Cargo Aprobador", field: "nombreCargoAprobador", editable: true },
        { headerName: "Unidad", field: "nombreUnidad", editable: true },
        { headerName: "Dirección", field: "nombreDireccion", editable: true },
    ]);

    // Fetch data & update rowData state
    useEffect(() => {
        setRowData(jerarquiaCargos);
    }, [jerarquiaCargos]);

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
                    columns: ["nombreCargo", "nombreCargoAprobador"], 
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

export default TableJerarquiaCargos;
