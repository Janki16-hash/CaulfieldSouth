import {
	CheckboxControl,
	Flex,
	PanelRow,
	SelectControl,
	withFilters,
} from '@wordpress/components';
import { applyFilters } from '@wordpress/hooks';
import { __ } from '@wordpress/i18n';
import React from 'react';
import { withMeta } from '../hoc/withMeta';
import {
	CenteredSidebar,
	ContainedSidebar,
	Customizer,
	LeftSidebar,
	NoSidebar,
	RightSidebar,
	StretchedSidebar,
} from './Icons';
import { MetaProps } from './types';

const OPTIONS = applyFilters('zakra.meta.general.layout', [
	{
		label: __('Customizer', 'zakra'),
		icon: Customizer,
		value: 'customizer',
	},
	{
		label: __('Normal', 'zakra'),
		icon: ContainedSidebar,
		value: 'contained',
	},
	{
		label: __('Narrow', 'zakra'),
		icon: CenteredSidebar,
		value: 'centered',
	},
	{
		label: __('Full Width', 'zakra'),
		icon: StretchedSidebar,
		value: 'stretched',
	},
]) as Array<{
	label: string;
	icon: React.ElementType;
	value: string;
}>;

const SIDEBAR_OPTIONS = applyFilters('zakra.meta.general.sidebar', [
	{
		label: __('Customizer', 'zakra'),
		icon: Customizer,
		value: 'customizer',
	},
	{
		label: __('No Sidebar', 'zakra'),
		icon: NoSidebar,
		value: 'no_sidebar',
	},
	{
		label: __('Right Sidebar', 'zakra'),
		icon: RightSidebar,
		value: 'right',
	},
	{
		label: __('Left Sidebar', 'zakra'),
		icon: LeftSidebar,
		value: 'left',
	},
]) as Array<{
	label: string;
	icon: React.ElementType;
	value: string;
}>;

const GeneralPanel = ({ meta, updateMeta }: MetaProps) => {
	const containerLayout = meta?.zakra_page_container_layout ?? 'customizer';
	const currentLayout = meta?.zakra_page_sidebar_layout ?? 'customizer';

	return (
		<PanelRow>
			<Flex className="mainFlexbox" direction={'column'}>
				<p>{__('Layout', 'zakra')}</p>
				<Flex style={{ flex: 1, flexWrap: 'wrap', gap: 8 }}>
					{OPTIONS?.map((option) => {
						const Icon = option.icon;
						return (
							<Flex
								key={option.value}
								style={{ width: 'calc(50% - 10px)' }}
								data-state={
									containerLayout === option.value ? 'active' : 'inactive'
								}
								onClick={() => {
									updateMeta?.('zakra_page_container_layout', option.value);
								}}
							>
								<Icon className={option.value} />
							</Flex>
						);
					})}
				</Flex>
				{'contained' === containerLayout && (
					<>
						<p>{__('Sidebar', 'zakra')}</p>
						<Flex style={{ flex: 1, flexWrap: 'wrap', gap: 8 }}>
							{SIDEBAR_OPTIONS?.map((option) => {
								const Icon = option.icon;
								return (
									<Flex
										key={option.value}
										style={{ width: 'calc(50% - 10px)' }}
										data-state={
											currentLayout === option.value ? 'active' : 'inactive'
										}
										onClick={() => {
											updateMeta?.('zakra_page_sidebar_layout', option.value);
										}}
										role="button"
										tabIndex={0}
										aria-label={option.label}
										onKeyDown={(e) => {
											if (e.key === 'Enter' || e.key === ' ') {
												updateMeta?.('zakra_page_sidebar_layout', option.value);
											}
										}}
									>
										<Icon className={`${option.value} hover:cursor-pointer`} />
									</Flex>
								);
							})}
						</Flex>
					</>
				)}

				<Flex className={'padding-section'} align="baseline">
					<p>{__('Remove content padding', 'zakra')}</p>
					<CheckboxControl
						checked={meta?.zakra_remove_content_margin}
						onChange={(val) => {
							updateMeta?.('zakra_remove_content_margin', val);
						}}
						className="checkboxWidth"
					/>
				</Flex>
				<div className="underline" />
				<Flex className={'padding-section'} direction={'column'}>
					<p className="bold" style={{ marginBottom: '4px' }}>
						{__('Sidebar', 'zakra')}
					</p>
					<SelectControl
						onChange={(value) => {
							updateMeta?.('zakra_sidebar', value);
						}}
						size="__unstable-large"
						value={meta?.zakra_sidebar}
						options={[
							{
								label: __('Default', 'zakra'),
								value: 'default',
							},
							{
								label: __('Sidebar Right', 'zakra'),
								value: 'sidebar-right',
							},
							{
								label: __('Sidebar Left', 'zakra'),
								value: 'sidebar-left',
							},
							{
								label: __('Footer One', 'zakra'),
								value: '1',
							},
							{
								label: __('Footer Two', 'zakra'),
								value: '2',
							},
							{
								label: __('Footer Three', 'zakra'),
								value: '3',
							},
							{
								label: __('Footer Four', 'zakra'),
								value: '4',
							},
						]}
					/>
				</Flex>
			</Flex>
		</PanelRow>
	);
};

export default withMeta(withFilters('ZakraMetaGeneralPanel')(GeneralPanel));
