@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Appointment #{{ $appointment->id }}</h1>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Appointments
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('appointments.update', $appointment) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">Patient *</label>
                        <select class="form-select @error('patient_id') is-invalid @enderror" id="patient_id" name="patient_id" required>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->name }} ({{ $patient->phone }})
                                </option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                @if(auth()->user()->isAdmin())
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Doctor *</label>
                        <select class="form-select @error('doctor_id') is-invalid @enderror" id="doctor_id" name="doctor_id" required>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->name }} ({{ $doctor->specialization }})
                                </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @else
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Doctor</label>
                        <input type="text" class="form-control" value="{{ $appointment->doctor->name }}" disabled>
                    </div>
                </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">Appointment Date & Time *</label>
                        <input type="datetime-local" class="form-control @error('appointment_date') is-invalid @enderror" 
                               id="appointment_date" name="appointment_date" 
                               value="{{ old('appointment_date', $appointment->appointment_date ? $appointment->appointment_date->format('Y-m-d\TH:i') : '') }}" required>
                        @error('appointment_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="scheduled" {{ old('status', $appointment->status) === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="completed" {{ old('status', $appointment->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status', $appointment->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Clinical Notes</label>
                <textarea class="form-control @error('notes') is-invalid @enderror" 
                          id="notes" name="notes" rows="4">{{ old('notes', $appointment->notes) }}</textarea>
                @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Appointment
                </button>
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
