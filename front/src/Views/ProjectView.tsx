import { ReactElement } from 'react';
import { IndexView, IndexViewProps, StoreView, StoreViewProps } from './View';
import { ListGroup } from 'react-bootstrap';
import { ProjectResource, ProjectStoreResource } from '~/Models/Project';
import route from '~/route';
import { Control } from '@ikepu-tp/react-bootstrap-extender/Form';

export type ProjectIndexViewProps = {};
export function ProjectIndexView(props: IndexViewProps<ProjectResource> & ProjectIndexViewProps): ReactElement {
	return (
		<IndexView
			{...props}
			itemCallback={(item: ProjectResource) => <ListGroup.Item key={item.id}></ListGroup.Item>}
			itemWrapper={ListGroup}
			createLink={route('project.store', { project: 'new' })}
		/>
	);
}

export type ProjectStoreViewProps = {};
export function ProjectStoreView(props: StoreViewProps<ProjectStoreResource> & ProjectStoreViewProps): ReactElement {
	return (
		<StoreView {...props}>
			<Control
				label="プロジェクト名"
				name="name"
				value={props.Resource['name']}
				maxLength={30}
				onChange={props.changeResourceStr}
				required
			/>
			<Control
				label="サブシステム名"
				name="sub_name"
				value={props.Resource['sub_name']}
				maxLength={30}
				onChange={props.changeResourceStr}
			/>
			<Control
				label="備考"
				as={'textarea'}
				name="note"
				value={props.Resource['note']}
				onChange={props.changeResourceStr}
			/>
		</StoreView>
	);
}