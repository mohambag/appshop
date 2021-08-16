function paramsCellArray = targets_get_trace_parameters
% TARGETS_GET_TRACE_PARAMETERS: returns a cell array of the required
% parameters for the traceability feature

% Copyright 2007-2010 The MathWorks, Inc.

% These are the list of model parameters that are needed for the
% Traceability feature to work.
paramsCellArray = {'GenerateReport',...
                  'IncludeHyperlinkInReport',...
                  'GenerateTraceInfo',...
                  'GenerateComments',...
                  'SimulinkBlockComments'};
    
