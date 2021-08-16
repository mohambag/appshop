classdef Signal < Simulink.Signal
%canlib.Signal  Class definition.

%   Copyright 2009-2012 The MathWorks, Inc.

  methods
    %---------------------------------------------------------------------------
    function setupCoderInfo(h)
      % Use custom storage classes from this package
      useLocalCustomStorageClasses(h, 'canlib');

      % Set up object to use custom storage class by default
      h.CoderInfo.StorageClass = 'Custom';
      h.CoderInfo.CustomStorageClass = 'Daq_List_Signal_Processing';
    end

  end % methods
end % classdef
