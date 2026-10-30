@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Patient Details: {{ $patient->name }}</h1>
    <div>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left"></i> Back to Patients
        </a>
        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit"></i> Edit Patient
        </a>
        <a href="{{ route('appointments.create') }}?patient_id={{ $patient->id }}" class="btn btn-primary">
            <i class="fas fa-calendar-plus"></i> Schedule Appointment
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0"><i class="fas fa-user"></i> Personal Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 35%;">Full Name:</th>
                            <td>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><a href="tel:{{ $patient->phone }}">{{ $patient->phone }}</a></td>
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>
                            <td>{{ $patient->date_of_birth->format('M d, Y') }} ({{ $patient->date_of_birth->age }} years)</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{ ucfirst($patient->gender) }}</td>
                        </tr>
                        <tr>
                            <th>Assigned Doctor:</th>
                            <td>
                                <strong>{{ $patient->doctor->name }}</strong>
                                <span class="text-muted">({{ $patient->doctor->specialization ?? 'General' }})</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $patient->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0"><i class="fas fa-notes-medical"></i> Medical History</h5>
            </div>
            <div class="card-body">
                @if($patient->medical_history)
                    <p class="card-text text-dark" style="white-space: pre-line;">{{ $patient->medical_history }}</p>
                @else
                    <p class="text-muted">No medical history recorded for this patient.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-calendar-check"></i> Appointment History</h5>
        <span class="badge bg-primary">{{ $appointments->count() }} Appointments</span>
    </div>
    <div class="card-body">
        @if($appointments->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date & Time</th>
                            <th>Doctor</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->appointment_date->format('M d, Y - H:i A') }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>
                                @if($appointment->status === 'scheduled')
                                    <span class="badge bg-warning">Scheduled</span>
                                @elseif($appointment->status === 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td>{{ Str::limit($appointment->notes ?? '—', 40) }}</td>
                            <td>
                                <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted mb-0">No appointments recorded for this patient yet.</p>
        @endif
    </div>
</div>
@endsection
